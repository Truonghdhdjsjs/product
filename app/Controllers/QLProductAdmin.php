<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use App\Models\CategoryModel;
use CodeIgniter\Files\File;

class QLProductAdmin extends BaseController
{

    protected $helpers = ['form'];

    public function index()
    {
        $productsModel = new ProductsModel();
        $data = [
            'products' => $productsModel->getAllForAdmin()
        ];

        return view('admin/qlproduct', $data);
    }

    public function delete($id = null)
    {
        $productsModel = new ProductsModel();
        $data['products'] = $productsModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('../admin/qlproduct'));
    }


    public function add()
    {
        $productsModel = new ProductsModel();
        $catalog = new CategoryModel();
        $data = [
            'products' => $productsModel->getAllForAdmin(),
            'dm_sp' => $catalog->getAll()
        ];

        return view('admin/product_add', $data);
    }

    public function insert()
    {
        $productsModel = new ProductsModel();
        $data['products'] = $productsModel->getAll();
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[userfile,2048]'
                    . '|max_dims[userfile,4000,3000]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('/admin/qlproduct/add', $data);
        }
        $img = $this->request->getFile('userfile');

        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();
            $filepath_original =  $img->store();
            $filepath = WRITEPATH . '/uploads/' . $filepath_original;

            $data_file = new File($filepath);
            $date_folder = date('Ymd'); //20220516
            // echo "Data folder=" .$date_folder;
            //Tạo thư mục nếu kiểm tra không thấy trong thư mục upload
            $pathFolderSaveImage = ROOTPATH . 'public/uploads';
            if (!file_exists($pathFolderSaveImage)) {
                mkdir($pathFolderSaveImage, 0777, true);
            }

            $pathFolderSaveImage = $pathFolderSaveImage . '/images';
            if (!file_exists($pathFolderSaveImage)) {
                mkdir($pathFolderSaveImage, 0777, true);
            }

            $pathFolderSaveImage = $pathFolderSaveImage . '/' . $date_folder;
            if (!file_exists($pathFolderSaveImage)) {
                mkdir($pathFolderSaveImage, 0777, true);
            }
            //Kết thúc tạo thư mục
            $data_file->move($pathFolderSaveImage . '/', $newName);
            $productsModel = new ProductsModel();
            $data = [
                'name' => $this->request->getVar('tensp'),
                'price'  => $this->request->getVar('gia'),
                'discount'  => $this->request->getVar('giamgia'),
                'catalog_id'  => $this->request->getVar('dm_sp'),
                'content'  => $this->request->getVar('noidung'),
                'image_link'  => $date_folder . '/' . $newName,
            ];

            $productsModel->insert($data); //Thêm sản phẩm mới vào cơ sở dữ liệu
            return redirect()->to('/admin/qlproduct/add'); //Sau khi thêm thành công thì chuyển về lại thêm sản phẩm của admin

        } else {
            $data = ['errors' => 'The file has already been moved.'];
            return view('admin/product_add', $data);
        }
    }

    public function update($id = null)
    {
        $productsModel = new ProductsModel();
        $catelogyModel = new CategoryModel();

        $data = [
            'product_obj' => $productsModel->getItem($id),
            'dm_sp' => $catelogyModel->getAll()
        ];
        return view('admin/product_edit', $data);
    }


    public function edit()
    {
        $productsModel = new ProductsModel();
        $id = $this->request->getVar('id');
        //Hình ảnh
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[userfile,1024]'
                    . '|max_dims[userfile,1024,768]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('/admin/qlproduct/add', $data);
        }
        $img = $this->request->getFile('userfile');

        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();
            $filepath_original =  $img->store();
            $filepath = WRITEPATH . '/uploads/' . $filepath_original;

            $data_file = new File($filepath);
            $date_folder = date('Ymd'); //20220516
            // echo "Data folder=" .$date_folder;
            //Tạo thư mục nếu kiểm tra không thấy trong thư mục upload
            $pathFolderSaveImage = ROOTPATH . 'public/uploads';
            if (!file_exists($pathFolderSaveImage)) {
                mkdir($pathFolderSaveImage, 0777, true);
            }

            $pathFolderSaveImage = $pathFolderSaveImage . '/images';
            if (!file_exists($pathFolderSaveImage)) {
                mkdir($pathFolderSaveImage, 0777, true);
            }

            $pathFolderSaveImage = $pathFolderSaveImage . '/' . $date_folder;
            if (!file_exists($pathFolderSaveImage)) {
                mkdir($pathFolderSaveImage, 0777, true);
            }
            //Kết thúc tạo thư mục
            $data_file->move($pathFolderSaveImage . '/', $newName);
            //Két thuc hình ảnh

            $data = [
                'name' => $this->request->getVar('tensp'),
                'price'  => $this->request->getVar('gia'),
                'discount'  => $this->request->getVar('giamgia'),
                'catalog_id'  => $this->request->getVar('dm_sp'),
                'content'  => $this->request->getVar('noidung'),
                'image_link'  => $date_folder . '/' . $newName,
            ];
            $productsModel->update($id, $data);
            
        } else {
            $data = ['errors' => 'The file has already been moved.'];
            return view('admin/product_add', $data);
        }
        return $this->response->redirect(site_url('/admin/qlproduct'));
    }
}
