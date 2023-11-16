<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCompanyTable extends Migration
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
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'alamat_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'telp_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '13',
                'null' => true,
            ],
            'bidang_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'deskripsi_perusahaan' => [
                'type' => 'TEXT',
                'constraint' => '255',
                'null' => true,
            ],
            'foto_perusahaan'=> [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'id_user'=> [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_lokasi'=> [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_kategori'=> [
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
        $this->forge->addForeignKey('id_lokasi','lokasi','id');
        $this->forge->addForeignKey('id_kategori','kategori','id');
        $this->forge->createTable('company');
    
    }

    public function down()
    {
        $this->forge->dropTable('company', true);
    }
}
