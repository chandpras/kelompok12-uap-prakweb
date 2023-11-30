<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index(): string
    {
        return view('blank');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }

    // public function profile(){
    //     return view('company/profile');
    // }

}
