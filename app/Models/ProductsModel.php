<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'san_pham';
    protected $primaryKey = 'id';
    protected $allowedFields = ['catalog_id', 'name', 'price', 'content', 'discount', 'image_link', 'image_list', 'created', 'view'];

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
        $data = $this
            ->select('san_pham.id, san_pham.name, san_pham.price, san_pham.discount, dm_sp.name as dm_name')
            ->join('dm_sp', 'san_pham.catalog_id = dm_sp.id')
            ->orderBy('san_pham.id', 'ASC')->findAll();
        return $data;
    }


    //Dùng để phân trang cho trang sản phẩm
    public function getAllDataLimit($start_from = null, $per_page_record =null)
    {
        if($start_from==null && $per_page_record ==null)
        {
            return $this->orderBy('id', 'ASC')->findAll();
        }
        else{
            return $this->orderBy('id', 'ASC')->findAll($per_page_record, $start_from);
            //select * from products order by id ASC limit 0, 3;
            //->limit($start_from, $per_page_record);
        }
    }

    public function getCountTotalRows()
    {
        return $this->countAll();//select count(*) from products
    }
}
