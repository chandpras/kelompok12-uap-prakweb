<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfilePelamarTable extends Migration
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
            'nama_pelamar' => [
                'type' => "VARCHAR",
                'constraint' => '50',
            ],
            'email_pelamar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_pelamar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'telp_pelamar' => [
                'type' => 'VARCHAR',
                'constraint' => '13',
            ],
            'pendidikan_terakhir' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'medsos' => [
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
        $this->forge->createTable('profile_pelamar');
    }

    public function down()
    {
        $this->forge->dropTable('profile_pelamar', true);
    }
}
