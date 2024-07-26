<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_user' => $id])->first();
    }

    protected $allowedFields = ['id_user', 'username', 'email', 'password', 'level', 'fotouser'];
}
