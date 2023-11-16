<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLokasiTable extends Migration
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
            'nama_lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
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
        $this->forge->createTable('lokasi');
    
    }

    public function down()
    {
        $this->forge->dropTable('lokasi', true);
    }
}
