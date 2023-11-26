<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'name', 'role'];

    public function getUserByUsername($username)
    {
        $data = $this->where('username', $username)->first();//select * from admin where username = $username
        
        return $data;// object là user của admin
    }
}
