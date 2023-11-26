<?php

namespace App\Controllers;
use App\Models\ProductsModel;

class ProductFrontend extends BaseController
{
/*     public function index()
    {
        return view('frontend/products');
    } */

    public function index($page = null)
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

        //Tính toán để phân trang
        $html_paging = '';
        if ($page >= 2) {
            $html_paging .= '<li class="page-item">';
            $html_paging .= "<a class='page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0' href='" . base_url() . "/products/" . ($page - 1) . "'>Quay lại</a>";
            $html_paging .= '</li>';
        } 

        for ($i = 1; $i <= $total_pages; $i++) {
            // if ($i == $page) {
            //     $html_paging .= '<li class="page-item disabled">';
            //     $html_paging .= "<a class = 'page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0' href='" . base_url() . "/products/"
            //         . $i . "'>" . $i . " </a>";
            //     $html_paging .= '</li>';
            // } else {
                $html_paging .= '<li class="page-item '.($i==$page? 'disabled' :'').' ">';
                $html_paging .= "<a class='page-link ".($i==$page? 'active' :'')." rounded-0 mr-3 shadow-sm border-top-0 border-left-0' href='" . base_url() . "/products/" . $i . "'>
                                                " . $i . " </a>";
                $html_paging .= '</li>';
           // }
        };

        if ($page < $total_pages) {
            $html_paging .= '<li class="page-item">';
            $html_paging .= "<a class='page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0' href='" . base_url() . "/products/" . ($page + 1) . "'>Đi tới</a>";
            $html_paging .= '</li>';
        } 

        $data = [
            'errors' => [],
            'products' => $dataProducts,           
            'html_paging' => $html_paging
        ];

        return view('frontend/products', $data);
    }

    public function detail($id=null)
    {
        $productsModel = new ProductsModel();
        $data['product'] = $productsModel->getItem($id);        
        return view('frontend/product_detail', $data);
    }

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