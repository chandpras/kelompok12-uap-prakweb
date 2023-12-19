<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSublowonganTable extends Migration
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
            'status_lamaran' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'cv'=> [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'id_lowongan'=> [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_pelamar'=> [
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
        $this->forge->addForeignKey('id_lowongan','lowongan','id','CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pelamar','applicant','id','CASCADE', 'CASCADE');
        $this->forge->createTable('sublowongan');
    }

    public function down()
    {
        
        $this->forge->dropTable('sublowongan', true);
    }
}
