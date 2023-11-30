<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompanyModel;
use App\Models\LowonganModel;

class LowonganController extends BaseController
{
    public $companyModel;
    public $lowonganModel;
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('lowongan');
        $this->lowonganModel = new LowonganModel();
        $this->companyModel = new CompanyModel();
    }

    public function index()
    {
        return view('company/lowongan');
    }

    public function createLowongan(){

        // $this->builder->select('company.id as id_company');
        // $this->builder->where('company.id', $id);
        // $query = $this->builder->get();
        
        // $data['company'] = $query->getRow();

        $companyModel = new CompanyModel();
        $this->lowonganModel = new LowonganModel();

        $lowongan = $this->lowonganModel->getLowongan();

        $data = [
            'title' => 'Create Lowongan',
            'lowongan' => $lowongan,
            'id_company' => $companyModel,
        ];
        // dd($data);
        return view ('company/viewlowongan', $data);
    }

    public function tambahLowongan(){

        return view ('company/create_lowongan');
    }
    public function saveLowongan(){
        // dd($this->request->getVar());
        // $this->companyModel = new CompanyModel();

        // $this->lowonganModel->saveLowongan([
        //     'judul_pekerjaan' => $this->request->getVar('judul_pekerjaan'),
        //     'posisi' => $this->request->getVar('posisi'),
        //     'tipe_pekerjaan' => $this->request->getVar('tipe_pekerjaan'),
        //     'tugas' => $this->request->getVar('tugas'),
        //     'gaji' => $this->request->getVar('gaji'),
        //     'persyaratan_kerja' => $this->request->getVar('persyaratan_kerja'),
        //     'cv' => $this->request->getVar('cv'),
            
        // ]);

        // return redirect()->to(base_url('/company/viewlowongan'));
    }
    public function simpanLowongan(){
        return view('company/viewlowongan');
    }
}
