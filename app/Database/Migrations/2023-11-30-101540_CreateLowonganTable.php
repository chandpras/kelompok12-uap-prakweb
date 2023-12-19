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
            'posisi_lowongan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tipe_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'deskripsi_pekerjaan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gaji_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'foto_lowongan'=> [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'id_lokasi'=> [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
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
        $this->forge->addForeignKey('id_lokasi','lokasi','id','CASCADE', 'CASCADE');
        $this->forge->createTable('lowongan');
    
    }

    public function down()
    {
        $this->forge->dropTable('lowongan', true);
    }
}
