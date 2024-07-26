<?php

namespace App\Models;

use CodeIgniter\Model;

class Onhold_model extends Model
{
    protected $table = 'Views_onhold';
    protected $db;



    // public function getOnhold()
    // {
    //     // return $this->db->query("select * from tb_ticket ;");
    //     return $this->db->table($this->table)->select('hitungan')->get()->getResultArray();
    // }

    // protected $allowedFields = ['id', 'subject', 'requestname', 'email', 'priority', 'status', 'keterangan', 'image'];


    // public function getOnhold()
    // {
    //     $builder = $this->db->table('tb_ticket');
    //     $builder->select('status, COUNT("status") WHERE status=Onhold AS jumlah');
    //     $builder->groupBy('status');
    //     $query = $builder->get();
    //     return $query;
    // }
}
