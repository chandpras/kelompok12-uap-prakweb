<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompanyModel;
use App\Models\ApplicantModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    protected $db, $builder;
    public $userModel;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->where('name !=', 'admin');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->where('name', 'applicant');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query2 = $this->builder->get();

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->where('name', 'company');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query3 = $this->builder->get();

        $data = [
            'users' => $query->getResult(),
            'applicant_count' => $query2->getNumRows(),
            'company_count' => $query3->getNumRows()
        ];

        // $company = new CompanyModel();
        // $data['company'] = $company->findAll();

        // $applicant = new ApplicantModel();
        // $data['applicant'] = $applicant->findAll();

        return view('admin/index', $data);
    }

    public function detail($id = 0)
    {
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->where('users.id', $id);
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        
        $data['user'] = $query->getRow();
        
        // $company = new CompanyModel();
        // $data['company'] = $company->findAll();

        // $applicant = new ApplicantModel();
        // $data['applicant'] = $applicant->findAll();

        if(empty($data['user'])){
            return redirect()->to('/admin');
        }

        return view('admin/user_detail', $data);
    }

    public function destroy($id)
    {
        $this->builder->where('id', $id);
        $this->builder->delete();
        $result = $this->builder->get();

        if(!$result){
            return redirect()->to(base_url('/'));
        }
        
        return redirect()->back();
    }
}
