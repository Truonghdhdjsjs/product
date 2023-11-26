<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\mySession; // Import library
use App\Models\ProductsModel;

use App\Models\TransactionModel;
use App\Models\OrdersModel;

use Config\MyConfig; // Loading config class

class Cart extends BaseController
{

    protected $helpers = ['form'];

    public function index($id = null)
    {
        $mySess = new mySession();
        $myconfig = new MyConfig;
        /* $data = [
            'id'=>'3',
            'tensp' => 'SP02',
            'gia'  => '140000',
            'giamgia'  => "3",
            'soluong'  => 1,                  
        ]; */
        if ($id != null) {
            $productsModel = new ProductsModel();
            $product = $productsModel->getItem($id);
            $data = [
                'id' => $product["id"],
                'tensp' => $product["name"],
                'gia'  => $product["price"],
                'giamgia'  => $product["discount"],
                'soluong'  => 1,
            ];
            //Thêm dữ liệu vào giỏ hàng
            $mySess->addCart($data, $myconfig->keyCart);
        }

        $dataCart['cart'] = $mySess->getCart($myconfig->keyCart);
        if(empty($dataCart['cart']))
        {
            $dataCart['cart'] = [];
        }
        return view('frontend/cart', $dataCart);
    }

    public function update($id = null)
    {
        $mySess = new mySession();
        $myconfig = new MyConfig;

        if ($id != null) {
            $soluong = $this->request->getVar("sl");
            $mySess->updateSoluongItem($myconfig->keyCart, $id, $soluong);
        }

        //Load lại giỏ hàngs
        $dataCart['cart'] = $mySess->getCart($myconfig->keyCart);
        return $this->response->setJSON("1");
    }

    public function delete($id = null)
    {
        $mySess = new mySession();
        $myconfig = new MyConfig;

        if ($id != null) {
            $mySess->removeItemCart($myconfig->keyCart, $id);
        }

        //Load lại giỏ hàngs
        $dataCart['cart'] = $mySess->getCart($myconfig->keyCart);
        return view('frontend/cart', $dataCart);
    }

    public function form()
    {
        $mySess = new mySession();
        $myconfig = new MyConfig; // Creating an instance     
        
        //Button cập nhật giỏ hàng
        if (isset($_POST['updateCart'])) {
            if ($this->request->getMethod() === 'post') {
                $data = $this->request->getPost();
                //Chinh sua mang lai theo cau truc moi
                //var_dump($data);              
                $arrData = $this->formatArray($data);
                $dataCart = $mySess->getCart($myconfig->keyCart);
                //Tim va cap nhat gio hang
                foreach ($arrData as $key => $item) {
                    foreach ($dataCart as $key1 => $item1) {
                        if ($item['id'] == $item1['id'] && $item['soluong'] != $item1['soluong']) {
                            $mySess->updateSoluongItem($myconfig->keyCart, $item['id'], $item['soluong']);
                        }
                    }
                }

                //Load lai gio hang
                $dataCart['cart'] = $mySess->getCart($myconfig->keyCart);
                return view('frontend/cart', $dataCart);
            }
        }

        //Button thanh toan
        if ($_POST['payment']) {
            //if ($mySess->checkLogin($myconfig->keyLogin)) {
                $dataCart = $mySess->getCart($myconfig->keyCart);
                
                //Lưu vào bảng Giao dịch
                //Tạo giao dịch
                $transacObject = new TransactionModel();
                $dataTracsaction = [
                    'status' => 1,
                    'user_id' => 1,
                    'user_name' => 'Trần Văn B',
                    'user_email' => 'tranvanb@gmail.com',
                    'user_phone' => '0986574210',
                    'amount' => '500000',
                    'payment' => 'COD',
                    'payment_info' => '',
                    'message' => '',
                    'security' => '',
                    'created' => ''
                ];

                $transacObject->insert($dataTracsaction);
                $idTran = $transacObject->getLastID();
            

                if (!empty($idTran)) {
                    foreach ($dataCart as $key => $item) {

                        $orderModel = new OrdersModel();
                        $data = [
                            'transaction_id' => $idTran['id'],
                            'product_id' => $item['id'],
                            'qty' => $item['soluong'],
                            'amount' => ($item['gia'] * $item['soluong']) - ($item['gia'] * $item['soluong'] * $item['giamgia'] / 100),
                            'data' => $item['giamgia'],
                            'status' => 1
                        ];
                        $orderModel->insert($data);
                    }
                }

                //Xóa giỏ hàng
                $mySess->deleteCart($myconfig->keyCart);
                return redirect()->to('/products'); //Khi thanh toán thành thì phải chuyển sang trang mua hàng thành công, trên màn hình có mã hóa đơn, lời cảm ơn
            // } else {
            //    //Chuyển sang trang đăng nhập
            //    $mySess->addCurrentURL($myconfig->keyURL, "cart"); //Lưu thông tin cái link mà người dùng đang đứng vào session
            //    return redirect()->to('/users/login');
            //} 
        }
    }

    

    function formatArray($data = null)
    {
        if ($data != null) {
            $arr = array();
            $i = 0;
            foreach ($data["cart"] as $keyitem => $value) {
                if ($keyitem % 2 == 0) {
                    $arr[$i] = array();
                    $arr[$i]['id'] = $value;
                } else {
                    $arr[$i]['soluong'] = $value[0];
                    $i++;
                }
            }
            return $arr;
        } else
            return null;
    }


}
