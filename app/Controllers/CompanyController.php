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
        // $data_user = $this->userModel->getUsers();
        // $data =[
        //     'title ' => 'Edit'
        // ];

        // return view('edit_company');
        return view('company/index');
    }

    public function profile()
    {
        $auth = service('authentication');
        $userId = $auth->id();
        $this->builder->select('nama_perusahaan, alamat_perusahaan, telp_perusahaan, bidang_perusahaan, deskripsi_perusahaan, foto_perusahaan, id_lokasi, id_kategori');
        
        $this->builder->where('id_user', $userId);
        $query = $this->builder->get();

        $data['company'] = $query->getResult();       

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
        return view ('create_company', $data);
    }
   
    // public function update(){
       
    //     return view ('company/profile_company');
    // }
    public function save(){
        // dd($this->request->getVar());
        // $this->companyModel = new CompanyModel();

        $this->companyModel->save([
            'id_user' => $this->request->getVar('id_user'),
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
            'telp_perusahaan' => $this->request->getVar('telp_perusahaan'),
            'bidang_perusahaan' => $this->request->getVar('bidang_perusahaan'),
            'deskripsi_perusahaan' => $this->request->getVar('deskripsi_perusahaan'),
            'id_lokasi' => $this->request->getVar('id_lokasi'),
            'id_kategori' => $this->request->getVar('id_kategori'),
        ]);

        return redirect()->to(base_url('/company'));

        // $data =[
        //     'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
        //     'alamat_perusahaan' => $this->request->getVar('nama_perusahaan'),
        //     'telp_perusahaan' => $this->request->getVar('nama_perusahaan'),
        //     'bidang_perusahaan' => $this->request->getVar('nama_perusahaan'),
        //     'deskripsi_perusahaan' => $this->request->getVar('nama_perusahaan'),
            
        // ];
        // return view('company/profile_company', $data);
    }
    
}
