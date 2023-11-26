<?php

namespace App\Models;

use CodeIgniter\Model;

class contactmodel extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','contact'];

    public function getAll()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }

}