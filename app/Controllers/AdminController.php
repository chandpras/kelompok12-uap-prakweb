<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompanyModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        // $this->builder->select('users.id as userid, username, email, name');
        // $this->builder->where('name !=', 'admin');
        // $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $query = $this->builder->get();

        // $data['users'] = $query->getResult();

        $company = new CompanyModel();
        $data['company'] = $company->findAll();

        return view('admin/index', $data);
    }
}
