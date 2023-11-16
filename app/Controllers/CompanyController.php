<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CompanyController extends BaseController
{
    public function index()
    {
        return view('company/index');
    }

    public function profile()
    {
        return view('company/profile_company');
    }
}
