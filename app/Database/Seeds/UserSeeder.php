<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();

        $userModel->save([
            'username' => 'useradmin', 
            'password'=> 'pwadmin', 
            'role' => 'admin'
        ]);

    }
}
