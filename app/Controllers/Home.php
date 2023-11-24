<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('about');
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
