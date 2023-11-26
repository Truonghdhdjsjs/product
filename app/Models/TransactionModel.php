<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'giao_dich';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'status', 'user_id', 'user_name', 'user_email', 
            'user_phone', 'amount', 'payment', 'payment_info', 'message', 'security', 'created'];

    public function getAll()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }


    public function getItem($id)
    {
        $data = $this->where('id', $id)->first();
        return $data;
    }

    public function getLastID()
    {
        return $this->selectMax('id')->first();
    }

 
}
