<?php

namespace App\Models;

use CodeIgniter\Model;

class contactsmodel extends Model
{
    protected $table = 'dieu_khoang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','name'];

    public function getAll()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }

}