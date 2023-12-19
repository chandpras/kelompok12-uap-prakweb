<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ApplicantModel;
use App\Models\SublowonganModel;

class SublowonganController extends BaseController
{

    public $applicantModel;
    public $sublowonganModel;
    protected $db;
    protected $builder, $buildervac, $builderapp;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('sublowongan');
        $this->buildervac = $this->db->table('lowongan');
        $this->builderapp = $this->db->table('applicant');
        $this->sublowonganModel = new SublowonganModel();
        $this->applicantModel = new ApplicantModel();
    }

    public function index()
    {
        //
    }

    public function tambahSublowongan($id)
    { // Views Form Tambah Submission Lowongan

        $this->buildervac->select('*, lowongan.id as vacid');
        $this->buildervac->where('lowongan.id', $id);
        $this->buildervac->join('lokasi', 'lokasi.id = lowongan.id_lokasi');
        $this->buildervac->join('company', 'company.id = lowongan.id_company');
        $query = $this->buildervac->get();

        $data['infovac'] = $query->getResult();

        return view ('applicant/daftar_kerja', $data);
    }

    public function savesublowongan()
    { // Views Save Tambah Submission Lowongan

        $path = 'assets/uploads/pdf/';
        $pdf = $this->request->getFile('cv');
        $name = $pdf->getRandomName();

        if($pdf->move($path, $name)) 
        {
            $pdf = base_url($path . $name);
        }

        $this->builderapp->select('id');
        $this->builderapp->where('id_user', $this->request->getVar('id_user'));
        $query = $this->builderapp->get();
        
        $this->sublowonganModel->save([
            'id_pelamar' => $query->getRow()->id,
            'id_lowongan' => $this->request->getVar('id_lowongan'),
            'status_lamaran' => 'Menunggu',
            'cv' => $pdf,
        ]);

        return redirect()->to(base_url('/applicant'));
    }

    public function editSubmission($id)
    { // Views Edit Submission Lowongan

        $this->builder->select('*, sublowongan.id as subid');
        $this->builder->where('sublowongan.id', $id);
        $this->builder->join('lowongan', 'lowongan.id = sublowongan.id_lowongan');
        $this->builder->join('applicant', 'applicant.id = sublowongan.id_pelamar');
        $this->builder->join('lokasi', 'lokasi.id = lowongan.id_lokasi');
        $this->builder->join('company', 'company.id = lowongan.id_company');
        $this->builder->join('users', 'users.id = applicant.id_user');
        $querysub = $this->builder->get();

        $data = [
            'title' => 'View Submission',
            'submission' => $querysub->getResult(),
        ];

        return view('company/status_lamaran', $data);
    }

    public function updateSubmission()
    { // Fungsi Update Submission Lowongan

        $id = $this->request->getVar('id_sublowongan');
        $data = [
            'status_lamaran' => $this->request->getVar('status'),
        ];

        $result = $this->sublowonganModel->update($id, $data);

        if(!$result){
            return redirect()->back()->withInput();
        }

        return redirect()->to(base_url('/company'));
    }

    public function downloadFile($id)
    { // Fungsi Download PDF CV

        $this->builder->select('cv');
        $this->builder->where('id', $id);
        $query = $this->builder->get();

        $pdf = $query->getRow()->cv;
        
        $localFilePath = str_replace('http://localhost:8080/', '', $pdf);

        $fullPath = FCPATH . $localFilePath;
        
        return $this->response->download($fullPath, null);
    }
}

