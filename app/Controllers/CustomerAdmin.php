<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerAdmin extends BaseController
{
    protected $helpers = ['form'];
    //Liet ke Khach
    public function index()
    {
        $customerModel = new CustomerModel();
        $data = [
            'customer' => $customerModel->getAllForAdmin()
        ];

        return view('admin/qlkhach', $data);
    }
    //End Liet Ke Khach


    //Delete Khach
    public function delete($id = null)
    {
        $customerModel = new CustomerModel();
        $data['customer'] = $customerModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('../admin/qlkhach'));
    }
    //End Delete Khach




    public function add()
    {
        $customerModel = new CustomerModel();
        $data = [
            'customer' => $customerModel->getAllForAdmin()
        ];

        return view('admin/qlkhach_add', $data);
    }





    public function insert()
    {

        $customer = new CustomerModel();

        $data = [
            'name' => $this->request->getVar('tenkhach'),
            'email'  => $this->request->getVar('email'),
            'phone'  => $this->request->getVar('diachi'),
            'address'  => $this->request->getVar('sodt'),
            'password'  => $this->request->getVar('matkhau'),
            //'created'  => $this->request->getVar('ngaytao')
        ];

        $customer->insert($data); //Thêm sản phẩm mới vào cơ sở dữ liệu
        return redirect()->to('/admin/qlkhach/add'); //Sau khi thêm thành công thì chuyển về lại thêm sản phẩm của admin


    }



    public function update($id = null)
    {
        $customerModel = new CustomerModel();
        $data = [
            'customer' => $customerModel->getItem($id),
        ];

        return view('admin/qlkhach_edit', $data);
    }


    public function edit()
    {
        $customerModel = new CustomerModel();
        $id = $this->request->getVar('id');

        $data = [
            'name' => $this->request->getVar('tenkhach'),
            'email'  => $this->request->getVar('email'),
            'address'  => $this->request->getVar('diachi'),
            'phone'  => $this->request->getVar('sodt'),
            'password'  => $this->request->getVar('matkhau'),
        ];
        $customerModel->update($id, $data);

        return $this->response->redirect(site_url('/admin/qlkhach_edit'));
    }
}
