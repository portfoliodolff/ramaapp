<?php

namespace App\Models;

use CodeIgniter\Model;

class Inventory_model extends Model
{
    protected $table = 'tb_inventory';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    public function getInventory($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = ['id', 'noinventaris', 'jenisperangkat', 'divisi'];
}
