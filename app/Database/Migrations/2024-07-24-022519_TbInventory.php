<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbInventory extends Migration
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
            'noinventaris' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jenisperangkat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'divisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_inventory');
    }

    public function down()
    {
        $this->forge->dropTable('tb_inventory');
    }
}
