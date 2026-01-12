<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGenderToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
        'gender' => [
            'type'       => 'VARCHAR',
            'constraint' => 10,
            'after'      => 'email',
        ],
        'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
    ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'gender', 'updated_at');
    }
}
