<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompanyModel;
use App\Models\LokasiModel;
use App\Models\LowonganModel;
use App\Models\UserModel;

class LowonganController extends BaseController
{
    public $companyModel;
    public $lowonganModel;
    public $userModel;
    protected $db;
    protected $builder, $buildercomp;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('lowongan');
        $this->buildercomp = $this->db->table('company');
        $this->lowonganModel = new LowonganModel();
        $this->companyModel = new CompanyModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        //
    }

    public function viewLowongan(){

        $auth = service('authentication');
        $userId = $auth->id();

        $this->buildercomp->select('id');
        $this->buildercomp->where('id_user', $userId);
        $queryidcomp = $this->buildercomp->get();
        
        // $this->builder->select('company.id as id_company');
        // $this->builder->where('company.id', $id);
        // $query = $this->builder->get();
        
        // $data['company'] = $query->getRow();

        // $companyModel = new CompanyModel();
        // $this->lowonganModel = new LowonganModel();

        $this->builder->select('lowongan.id as vacid, judul_pekerjaan, posisi_lowongan, tipe_pekerjaan, gaji_pekerjaan, nama_lokasi');
        $this->builder->where('id_company', $queryidcomp->getRow()->id);
        $this->builder->join('lokasi', 'lokasi.id = lowongan.id_lokasi');
        $this->builder->join('company', 'company.id = lowongan.id_company');
        $querylowongan = $this->builder->get();

        $data = [
            'title' => 'Create Lowongan',
            'lowongan' => $querylowongan->getResult(),
            // 'id_company' => $companyModel,
        ];
        // dd($data);
        return view ('company/viewlowongan', $data);
    }

    public function createLowongan(){

        $lokasiModel = new LokasiModel();

        $data = [
            'lokasi' => $lokasiModel->orderby('nama_lokasi')->findAll(),
        ];

        return view ('company/create_lowongan', $data);
    }
    public function saveLowongan()
    {

        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto_lowongan');
        $name = $foto->getRandomName();

        if($foto->move($path, $name)) 
        {
            $foto = base_url($path . $name);
        }

        $this->buildercomp->select('id');
        $this->buildercomp->where('id_user', $this->request->getVar('id_user'));
        $query = $this->buildercomp->get();
        
        $this->lowonganModel->save([
            'id_company' => $query->getRow()->id,
            'id_lokasi' => $this->request->getVar('id_lokasi'),
            'judul_pekerjaan' => $this->request->getVar('judul_pekerjaan'),
            'posisi_lowongan' => $this->request->getVar('posisi'),
            'tipe_pekerjaan' => $this->request->getVar('tipe_pekerjaan'),
            'deskripsi_pekerjaan' => $this->request->getVar('deskripsi'),
            'gaji_pekerjaan' => $this->request->getVar('gaji'),
            'foto_lowongan' => $foto,
        ]);

        return redirect()->to(base_url('/company'));
    }

    public function deleteLowongan($id)
    {
        $this->builder->where('id', $id);
        $this->builder->delete();
        $result = $this->builder->get();

        if(!$result){
            return redirect()->to(base_url('/'));
        }
        
        return redirect()->back();
    }

    public function listPelamar(){
        return view('company/list_pelamar');
    }
    public function editPelamar(){
        return view('company/status_pelamar');
    }
    public function editLowongan(){
        return view('company/update_lowongan');
    }
}
