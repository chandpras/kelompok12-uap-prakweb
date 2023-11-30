<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLowonganTable extends Migration
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
            'judul_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'posisi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tipe_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tugas' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gaji' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'persyaratan_kerja'=> [
                'type' => 'TEXT',
                'null' => true,
            ],
            'cv'=> [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'id_company'=> [
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
        $this->forge->addForeignKey('id_company','company','id','CASCADE', 'CASCADE');
        $this->forge->createTable('lowongan');
    
    }

    public function down()
    {
        $this->forge->dropTable('lowongan', true);
    }
}
