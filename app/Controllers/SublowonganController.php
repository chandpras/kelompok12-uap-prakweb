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
    protected $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('sublowongan');
        $this->sublowonganModel = new SublowonganModel();
        $this->applicantModel = new ApplicantModel();
    }

    public function index()
    {
        return view('applicant/sublowongan');
    }

    public function createSublowongan()
    {
        $applicantModel = new ApplicantModel();
        $this->sublowonganModel = new SublowonganModel();

        $sublowongan = $this->sublowonganModel->getsubLowongan();

        $data = [
            'title' => 'Create SubLowongan',
            'sublowongan' => $sublowongan,
            'id_applicant' => $applicantModel,
        ];

        return view ('applicant/viewsublowongan', $data);
    }

    public function tambahSublowongan()
    {
        return view ('applicant/daftar_kerja');
    }

    public function savesublowongan()
    {
        return view('applicant/viewsublowongan');
    }

    public function simpanSublowongan()
    {
        return view('applicant/viewsublowongan');
    }
}
