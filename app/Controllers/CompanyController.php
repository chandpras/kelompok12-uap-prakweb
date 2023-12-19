<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompanyModel;
use App\Models\KategoriModel;
use App\Models\LokasiModel;
use App\Models\UserModel;

class CompanyController extends BaseController
{
    public $companyModel;
    public $userModel;
    protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('company');
        $this->companyModel = new CompanyModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $auth = service('authentication');
        $userId = $auth->id();

        // Select company attributes
        $this->builder->select();
        $this->builder->where('id_user', $userId);
        $query = $this->builder->get();

        // Check if there are any results
        if ($query->getNumRows() > 0) {
            // Results found, return true (1)
            $check = 1;
        } else {
            // No results found, return false (0)
            $check = 0;
        }

        $data = [
            'check'     => $check
        ];

        return view('company/index', $data);
    }

    public function profile()
    {
        $auth = service('authentication');
        $userId = $auth->id();

        // Select company attributes
        $this->builder->select('nama_perusahaan, alamat_perusahaan, telp_perusahaan, bidang_perusahaan, deskripsi_perusahaan, foto_perusahaan, nama_lokasi, nama_kategori');
        $this->builder->where('id_user', $userId);
        $this->builder->join('lokasi', 'lokasi.id = company.id_lokasi');
        $this->builder->join('kategori', 'kategori.id = company.id_kategori');
        $query = $this->builder->get();

        // Check if there are any results
        if ($query->getNumRows() > 0) {
            // Results found, return true (1)
            $check = 1;
        } else {
            // No results found, return false (0)
            $check = 0;
        }

        $data = [
            'company'   => $query->getResult(),
            'check'     => $check
        ];

        return view('company/profile_company', $data);
    }

    public function create(){

        $kategoriModel = new KategoriModel();
        $lokasiModel = new LokasiModel();
        $userModel = new UserModel();

        $this->companyModel = new CompanyModel();

        $company = $this->companyModel->getCompany();

        $data = [
            'title' => 'Create Company',
            'company' => $company,
            'kategori' => $kategoriModel->orderby('nama_kategori')->findAll(),
            'lokasi' => $lokasiModel->orderby('nama_lokasi')->findAll(),
            'id_user' => $userModel,
        ];
        // dd($kategoriModel->findAll());
        return view ('company/create_company', $data);
    }

    public function save(){
        // dd($this->request->getVar());
        // $this->companyModel = new CompanyModel();

        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto_perusahaan');
        $name = $foto->getRandomName();

        if($foto->move($path, $name)) 
        {
            $foto = base_url($path . $name);
        }

        $this->companyModel->save([
            'id_user' => $this->request->getVar('id_user'),
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
            'telp_perusahaan' => $this->request->getVar('telp_perusahaan'),
            'bidang_perusahaan' => $this->request->getVar('bidang_perusahaan'),
            'deskripsi_perusahaan' => $this->request->getVar('deskripsi_perusahaan'),
            'id_lokasi' => $this->request->getVar('id_lokasi'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'foto_perusahaan' => $foto,
        ]);

        return redirect()->to(base_url('/company'));
    }

    public function edit()
    {
        $kategoriModel = new KategoriModel();
        $lokasiModel = new LokasiModel();

        $auth = service('authentication');
        $userId = $auth->id();

        // Select applicant attributes
        $this->builder->select('id, nama_perusahaan, alamat_perusahaan, telp_perusahaan, bidang_perusahaan, deskripsi_perusahaan, foto_perusahaan, ');
        $this->builder->where('id_user', $userId);
        $query = $this->builder->get();

        $data = [
            'title' => 'Update Company',
            'company_data' => $query->getResult(),
            'kategori' => $kategoriModel->orderby('nama_kategori')->findAll(),
            'lokasi' => $lokasiModel->orderby('nama_lokasi')->findAll(),
        ];

        return view ('company/edit_company', $data);
    }

    public function update()
    {
        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto_perusahaan');

        $id = $this->request->getVar('id_profil');
        $data = [
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
            'telp_perusahaan' => $this->request->getVar('telp_perusahaan'),
            'bidang_perusahaan' => $this->request->getVar('bidang_perusahaan'),
            'deskripsi_perusahaan' => $this->request->getVar('deskripsi_perusahaan'),
            'id_lokasi' => $this->request->getVar('id_lokasi'),
            'id_kategori' => $this->request->getVar('id_kategori'),
        ];

        if($foto->isValid()){
            $name = $foto->getRandomName();

            if($foto->move($path, $name)){
                $foto_path = base_url($path . $name);

                $data['foto_perusahaan'] = $foto_path;
            }
        }

        $result = $this->companyModel->updateApplicant($data, $id);

        if(!$result){
            return redirect()->back()->withInput();
        }

        return redirect()->to(base_url('/company'));
    }

    
}
