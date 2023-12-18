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
    protected $buildervac, $buildercomp;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('applicant');
        $this->buildercomp = $this->db->table('company');
        $this->buildervac = $this->db->table('lowongan');
        $this->applicantModel = new ApplicantModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {

        // Vacancy & Company Data Display
        $this->buildervac->select('lowongan.id as vacid, judul_pekerjaan, posisi_lowongan, tipe_pekerjaan, gaji_pekerjaan, foto_lowongan, nama_lokasi, lowongan.updated_at');
        $this->buildervac->join('lokasi', 'lokasi.id = lowongan.id_lokasi');
        $this->buildervac->join('company', 'company.id = lowongan.id_company');
        $queryvacancy = $this->buildervac->get();

        $data = [
            'vacancy'   => $queryvacancy->getResult(),
        ];

        return view('applicant/index', $data);
        // dd($data);
    }

    public function profile()
    {
        $auth = service('authentication');
        $userId = $auth->id();

        // Select applicant attributes
        $this->builder->select('nama_pelamar, alamat_pelamar, 
        telp_pelamar, medsos, foto_pelamar, id_user');
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
            'applicant' => $query->getResult(),
            'check'     => $check
        ];


        // return dd($data);
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

        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto_pelamar');
        $name = $foto->getRandomName();

        if($foto->move($path, $name)) 
        {
            $foto = base_url($path . $name);
        }

        $this->applicantModel->save([
            'nama_pelamar' => $this->request->getVar('nama_pelamar'),
            'alamat_pelamar' => $this->request->getVar('alamat_pelamar'),
            'telp_pelamar' => $this->request->getVar('telp_pelamar'),
            'medsos' => $this->request->getVar('medsos'),
            'foto_pelamar' => $foto,
            'id_user' => $this->request->getVar('id_user'),
        ]);

        return redirect()->to(base_url('/applicant'));
    }

    public function edit()
    {
        $auth = service('authentication');
        $userId = $auth->id();

        // Select applicant attributes
        $this->builder->select('id, nama_pelamar, alamat_pelamar, 
        telp_pelamar, medsos, foto_pelamar, id_user');
        $this->builder->where('id_user', $userId);
        $query = $this->builder->get();

        $data = [
            'title' => 'Update Applicant',
            'applicant_data' => $query->getResult(),
        ];

        return view ('applicant/edit_applicant', $data);
    }

    public function update()
    {
        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto_pelamar');

        $id = $this->request->getVar('id_profil');
        $data = [
            'nama_pelamar' => $this->request->getVar('nama_pelamar'),
            'alamat_pelamar' => $this->request->getVar('alamat_pelamar'),
            'telp_pelamar' => $this->request->getVar('telp_pelamar'),
            'medsos' => $this->request->getVar('medsos'),
        ];

        if($foto->isValid()){
            $name = $foto->getRandomName();

            if($foto->move($path, $name)){
                $foto_path = base_url($path . $name);

                $data['foto_pelamar'] = $foto_path;
            }
        }

        $result = $this->applicantModel->updateApplicant($data, $id);

        if(!$result){
            return redirect()->back()->withInput();
        }

        return redirect()->to(base_url('/applicant'));
    }

    public function info($id = 0)
    {
        $this->buildervac->select();
        $this->buildervac->where('lowongan.id', $id);
        $this->buildervac->join('lokasi', 'lokasi.id = lowongan.id_lokasi');
        $this->buildervac->join('company', 'company.id = lowongan.id_company');
        $query = $this->buildervac->get();

        $data['infovac'] = $query->getResult();

        return view('applicant/info_lowongan', $data);
        // dd($data);
    }

    public function notif(){
        return view('applicant/notifikasi');
    }

    public function morejob(){
        return view('applicant/browse_more_job');
    }
}
