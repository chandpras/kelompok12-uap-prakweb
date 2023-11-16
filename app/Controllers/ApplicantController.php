<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ApplicantController extends BaseController
{
    public function index()
    {
        return view('applicant/index');
    }

    public function profile()
    {
        return view('applicant/profile_applicant');
    }
}
