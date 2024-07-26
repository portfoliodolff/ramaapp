<?php

namespace App\Models;

use CodeIgniter\Model;

class Datastasiun_model extends Model
{
    protected $table = 'tb_stasiun';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    public function getStasiun($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = ['id', 'kodestasiun', 'namastasiun', 'alamat'];
}
