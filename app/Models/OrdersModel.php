<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'don_hang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['transaction_id', 'id', 'product_id', 'qty', 'amount', 'data', 'status'];

    public function getAll()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }


    public function getItem($id)
    {
        $data = $this->where('id', $id)->first();
        return $data;
    }

 
}