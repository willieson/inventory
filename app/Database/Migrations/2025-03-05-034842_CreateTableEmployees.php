<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableEmployees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'        => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique'     => true,
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'role'    => [
                'type'       => 'ENUM',
                'constraint' => ['administrator', 'stakeholder'],
            ],
            'created_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
