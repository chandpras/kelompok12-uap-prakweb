<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
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
            'username' => [
                'type' => "VARCHAR",
                'constraint' => '50',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
        ]);

        $this->forge->addKey('id', true, true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user', true);
    }
}
