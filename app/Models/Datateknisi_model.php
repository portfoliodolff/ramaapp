<?php

namespace App\Models;

use CodeIgniter\Model;

class Datateknisi_model extends Model
{
    protected $table = 'tb_teknisi';
    protected $primaryKey = 'idteknisi';

    protected $useAutoIncrement = true;

    public function getTeknisi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['idteknisi' => $id])->first();
    }

    protected $allowedFields = ['idteknisi', 'nopegawai', 'namateknisi', 'notlp'];
}
