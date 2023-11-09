<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfileCompanyTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_perusahaan' => [
                'type' => "VARCHAR",
                'constraint' => '50',
            ],
            'deskripsi_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'bidang_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            
        ]);

        $this->forge->addKey('id', true, true);
        $this->forge->addForeignKey('id_user', 'user', 'id');
        $this->forge->createTable('profile_company');
    }

    public function down()
    {
        $this->forge->dropTable('profile_company');
    }
}
