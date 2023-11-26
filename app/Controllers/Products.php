<?php

namespace App\Controllers;

class Products extends BaseController
{
    public function index()
    {
        return view('welhome');
    }
    //Phân trang trong sản phẩm:
//Controller Products:
//Dùng cho xử lý phân trang bằng Ajax
    public function ajaxpaging($page = null)
    {
         
        $productsModel = new ProductsModel();
        
        $per_page_record = 5;

        if ($page == null) {
            $page  = 1;
        }   

        $start_from = ($page - 1) * $per_page_record;

        $dataProducts = $productsModel->getAllDataLimit($start_from, $per_page_record);

        $totalRows = $productsModel->getCountTotalRows();
        $total_pages = ceil($totalRows / $per_page_record);

        $data = [
            'errors' => [],
            'products' => $dataProducts,           
            'total_pages' =>  $total_pages
        ];

        return $this->response->setJSON($data);
    }
}