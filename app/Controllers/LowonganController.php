<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompanyModel;
use App\Models\LokasiModel;
use App\Models\LowonganModel;
use App\Models\SublowonganModel;
use App\Models\UserModel;

class LowonganController extends BaseController
{
    public $companyModel;
    public $lowonganModel;
    public $userModel;
    protected $db;
    protected $builder, $buildercomp, $buildersub, $builderapp;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('lowongan');
        $this->buildercomp = $this->db->table('company');
        $this->buildersub = $this->db->table('sublowongan');
        $this->builderapp = $this->db->table('applicant');
        $this->lowonganModel = new LowonganModel();
        $this->companyModel = new CompanyModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        //
    }

    public function viewLowongan()
    { // Views List Lowongan

        $auth = service('authentication');
        $userId = $auth->id();

        $this->buildercomp->select('id');
        $this->buildercomp->where('id_user', $userId);
        $queryidcomp = $this->buildercomp->get();

        $this->builder->select('*, lowongan.id as vacid');
        $this->builder->where('id_company', $queryidcomp->getRow()->id);
        $this->builder->join('lokasi', 'lokasi.id = lowongan.id_lokasi');
        $this->builder->join('company', 'company.id = lowongan.id_company');
        $querylowongan = $this->builder->get();

        $data = [
            'title' => 'Create Lowongan',
            'lowongan' => $querylowongan->getResult(),
        ];
        
        return view ('company/viewlowongan', $data);
    }

    public function createLowongan()
    { // Views Form Tambah Lowongan

        $lokasiModel = new LokasiModel();

        $data = [
            'lokasi' => $lokasiModel->orderby('nama_lokasi')->findAll(),
        ];

        return view ('company/create_lowongan', $data);
    }

    public function saveLowongan()
    { // Fungsi Save Tambah Lowongan

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
    { // Fungsi Delete Lowongan
        
        $this->builder->where('id', $id);
        $this->builder->delete();
        $result = $this->builder->get();

        if(!$result){
            return redirect()->to(base_url('/'));
        }
        
        return redirect()->back();
    }

    public function listPelamar()
    { // Fungsi List Pelamar Lowongan Aktif

        $auth = service('authentication');
        $userId = $auth->id();

        $this->buildercomp->select('company.id');
        $this->buildercomp->where('id_user', $userId);
        $queryidcomp = $this->buildercomp->get();

        $this->buildersub->select('*, sublowongan.id as subid');
        $this->buildersub->where('lowongan.id_company', $queryidcomp->getRow()->id);
        $this->buildersub->join('lowongan', 'lowongan.id = sublowongan.id_lowongan');
        $this->buildersub->join('applicant', 'applicant.id = sublowongan.id_pelamar');
        $this->buildersub->join('lokasi', 'lokasi.id = lowongan.id_lokasi');
        $this->buildersub->join('company', 'company.id = lowongan.id_company');
        $this->buildersub->join('users', 'users.id = applicant.id_user');
        $querysub = $this->buildersub->get();

        $data = [
            'title' => 'View Submission',
            'submission' => $querysub->getResult(),
        ];

        return view('company/list_pelamar', $data);
    }

    public function editLowongan(){
        return view('company/update_lowongan');
    }
}
