<?php

namespace App\Controllers;
use App\Models\ProductsModel;
use CodeIgniter\Files\File;

class ProductAdmin extends BaseController
{

    protected $helpers = ['form'];
    
    public function index()
    {
        $productsModel = new ProductsModel();
        $data = [             
            'products' => $productsModel->getAllForAdmin()
        ];

        return view('admin/products', $data);
    }

    public function delete($id = null){        
        $productsModel = new ProductsModel();
        $data['products'] = $productsModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('../admin/products'));
    }


    public function insert(){
        $productsModel = new ProductsModel();
        $data['products'] = $productsModel->getAll();        
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
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            
            return view('products_view', $data);
        }
        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) { 
            $newName = $img->getRandomName();
            $filepath_original =  $img->store();
            $filepath = WRITEPATH .'/uploads/'.$filepath_original;
            
            $data_file = new File($filepath);
            $date_folder = date('Ymd');//20220516
           // echo "Data folder=" .$date_folder;
           //Tạo thư mục nếu kiểm tra không thấy trong thư mục upload
            $pathFolderSaveImage = ROOTPATH.'public/uploads';
            if (!file_exists($pathFolderSaveImage)) 
            {
                mkdir($pathFolderSaveImage, 0777, true); 
            }

            $pathFolderSaveImage = $pathFolderSaveImage . '/images';
            if (!file_exists($pathFolderSaveImage)) 
            {
                mkdir($pathFolderSaveImage, 0777, true);
            }

            $pathFolderSaveImage = $pathFolderSaveImage . '/'. $date_folder;
            if (!file_exists($pathFolderSaveImage)) 
            {
                mkdir($pathFolderSaveImage, 0777, true);
            }
            //Kết thúc tạo thư mục
            $data_file->move($pathFolderSaveImage.'/', $newName);
            $productsModel = new ProductsModel();

            // var_dump($_POST);
            // echo "Nội dung======";
            // echo $this->request->getVar('noidung');
            // exit;

            $data = [
                'name' => $this->request->getVar('tensp'),
                'price'  => $this->request->getVar('gia'),
                'discount'  => $this->request->getVar('giamgia'),
                'nsx'  => $this->request->getVar('nsx'),
                'catelog_id'  => $this->request->getVar('xuatxu'),
                'content'  => $this->request->getVar('noidung'),
                'image_link'  => $date_folder.'/'.$newName,// $nameImgFile,//$this->request->getVar('link'),
            ];

            $productsModel->insert($data);

            /* $productsModel = new ProductsModel();
            $data = [
                'errors'=> [],
                'products' => $productsModel->paginate(3),
                'pager' => $productsModel->pager
            ]; */
            return redirect()->to('/products');
      
           //return view('products_view', $data);



        } else {
            $data = ['errors' => 'The file has already been moved.'];
            return view('products_view', $data);
        }        
    }

    public function update($id = null)
    {
        $productsModel = new ProductsModel();
        $data['product_obj'] =  $productsModel->getItem($id);
        return view('products_edit_view', $data);
    }
    

    public function updateSave(){
        $productsModel = new ProductsModel();
        $id = $this->request->getVar('id');
        $data = [
            'tensp' => $this->request->getVar('tensp'),
                'gia'  => $this->request->getVar('gia'),
                'giamgia'  => $this->request->getVar('giamgia'),
                'nsx'  => $this->request->getVar('nsx'),
                'xuatxu'  => $this->request->getVar('xuatxu'),
                'noidung'  => $this->request->getVar('noidung'),
                'link'  => $this->request->getVar('link'),
        ];
        $productsModel->update($id, $data);
        return $this->response->redirect(site_url('/products'));
    }

}