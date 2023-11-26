<?php

namespace App\Models;

use CodeIgniter\Model;

class dieukhoangmodel extends Model
{
    protected $table = 'dieukhoan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'content'];
    public function getAll()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }

}
