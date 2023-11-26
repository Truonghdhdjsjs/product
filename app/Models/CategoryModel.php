<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'dm_sp';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'parent_id', 'sort_order'];
  
    public function getAll()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }
}