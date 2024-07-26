<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_model extends Model
{
    protected $table = 'tb_ticket';
    protected $primaryKey = 'id';
    protected $db;

    protected $useAutoIncrement = true;


    public function getTiket($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = ['id', 'subject', 'requestname', 'email', 'priority', 'status', 'keterangan', 'fotouser'];


    // public function getOnhold()
    // {
    //     $builder = $this->db->table('tb_ticket');
    //     $builder->select('status, COUNT("status") WHERE status=Onhold AS jumlah');
    //     $builder->groupBy('status');
    //     $query = $builder->get();
    //     return $query;
    // }
}
