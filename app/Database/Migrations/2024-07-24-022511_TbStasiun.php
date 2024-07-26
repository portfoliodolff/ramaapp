<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbStasiun extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 255,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kodestasiun' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'namastasiun' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_stasiun');
    }

    public function down()
    {
        $this->forge->dropTable('tb_stasiun');
    }
}
