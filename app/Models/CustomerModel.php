<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'khach_hang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone', 'address', 'password', 'created'];

    public function getAll()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }


    public function getItem($id)
    {
        $data = $this->where('id', $id)->first();
        return $data;
    }

    //---------------------------------------------------------------------------
    //Sử dụng cho trang quản trị 
    public function getAllForAdmin()
    {
        $data = $this->select('khach_hang.id, khach_hang.name, khach_hang.email, khach_hang.phone,khach_hang.address,khach_hang.password,khach_hang.created')
            ->orderBy('khach_hang.id', 'ASC')->findAll();
        return $data;
    }
}
