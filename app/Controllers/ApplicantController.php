<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ApplicantModel;
use App\Models\UserModel;

class ApplicantController extends BaseController
{
    public $applicantModel;
    public $userModel;
    protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('applicant');
        $this->applicantModel = new ApplicantModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('applicant/index');
    }

    public function profile()
    {
        $auth = service('authentication');
        $userId = $auth->id();
        $this->builder->select('nama_pelamar, alamat_pelamar, 
        telp_pelamar, medsos, foto_pelamar, id_user');

        $this->builder->where('id_user', $userId);
        $query = $this->builder->get();

        $data['applicant'] = $query->getResult();       


        return view('applicant/profile_applicant', $data);
    }

    public function create(){

        $userModel = new UserModel();

        $this->applicantModel = new applicantModel();

        $applicant = $this->applicantModel->getApplicant();

        $data = [
            'title' => 'Create Applicant',
            'applicant' => $applicant,
            'id_user' => $userModel,
        ];

        return view ('applicant/create_applicant', $data);
    }

    public function save(){

        $this->applicantModel->save([
            'id' => $this->request->getVar('id'),
            'nama_pelamar' => $this->request->getVar('nama_pelamar'),
            'alamat_pelamar' => $this->request->getVar('alamat_pelamar'),
            'telp_pelamar' => $this->request->getVar('telp_pelamar'),
            'medsos' => $this->request->getVar('medsos'),
            'foto_pelamar' => $this->request->getVar('foto_pelamar'),
            'id_user' => $this->request->getVar('id_user'),

        ]);

        return redirect()->to(base_url('/applicant'));

    }

}
