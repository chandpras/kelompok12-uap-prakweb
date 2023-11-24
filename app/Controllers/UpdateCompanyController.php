<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UpdateCompanyController extends BaseController
{

    public $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data =[
            'title ' => 'Create'
        ];

        return view('edit_company');
    }
    public function update(){
       
        return view ('company/profile_company');
    }
}
