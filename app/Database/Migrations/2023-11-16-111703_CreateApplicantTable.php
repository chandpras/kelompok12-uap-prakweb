<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateApplicantTable extends Migration
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
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'alamat_pelamar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'telp_pelamar' => [
                'type' => 'VARCHAR',
                'constraint' => '13',
                'null' => true,
            ],
            'medsos' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'foto_pelamar'=> [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'id_user'=> [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at'=> [
                'type' => 'DATETIME',
                'null' => true,
            ],
    
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
    
            'deleted_at'=> [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true, true);
        $this->forge->addForeignKey('id_user','users','id');
        $this->forge->createTable('applicant');
    }

    public function down()
    {
        $this->forge->dropTable('applicant', true);
    }
}
