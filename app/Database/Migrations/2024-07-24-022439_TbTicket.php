<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbTicket extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 25,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'subject' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'requestname' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'priority' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',

            ],
            'keterangan' => [
                'type'       => 'TEXT',
                'constraint' => '255',
                'null' => True
            ],
            'fotouser' => [
                'type'       => 'TEXT',
                'constraint' => '255',
                'null' => True
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_ticket');
    }

    public function down()
    {
        $this->forge->dropTable('tb_ticket');
    }
}
