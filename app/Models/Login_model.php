<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_model extends Model
{
    // protected $table = 'tb_admin';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    // public function getLogin($id = false)
    // {
    //     if ($id == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where(['id' => $id])->first();
    // }

    // protected $allowedFields = ['id', 'username', 'password'];
    protected $table            = 'tb_admin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = ['id', 'username', 'password', 'email', 'lastlogin', 'created_at', 'updated_at'];

    // public function login($username, $password)
    // {
    //     $db = db_connect();
    //     $user = $db->table('tb_admin')->where(['username' => $username, 'password' => $password])->get()->getRow();
    //     if ($user) {
    //         return $user;
    //     } else {
    //         return false;
    //     }
    //     return $user ?? false;
    // }

    public function login($username, $password)
    {
        return $this->db->table('tb_user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
