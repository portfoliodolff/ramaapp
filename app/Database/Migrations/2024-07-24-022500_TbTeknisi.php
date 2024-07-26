<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbTeknisi extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'idteknisi' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nopegawai' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nemateknisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'notlp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]

        ]);
        $this->forge->addKey('idteknisi', true);
        $this->forge->createTable('tb_teknisi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_teknisi');
    }
}
