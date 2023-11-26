<?php

namespace App\Libraries;

class MySession
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    //Dùng để kiểm tra login trong session
    public function addLogin($key, $value)
    {
        if ($this->session->has($key)) {
            unset($_SESSION[$key]);
        }
        $dataLogin = [
            'logined' => true,
            'username' => $value["username"],
            'name'  => $value["name"],
            'role'  => $value["role"]
        ];
        $this->session->set($key, $dataLogin);
    }

    public function checkLogin($key)
    {
        if ($this->session->has($key)) {
            $arrLogin = $this->session->get($key);
            if (count($arrLogin) > 0) {
                if ($arrLogin['logined'])
                    return true;
                else
                    return false;
            } else return false;
        } else
            return false;
    }

    public function addCurrentURL($key, $URL)
    {
        if ($this->session->has($key)) {
            unset($_SESSION[$key]);
        }
         
        $this->session->set($key, $URL);
    }

    public function getBackURL($key)
    {
        if ($this->session->has($key)) {
            $strURL = $this->session->get($key);
            return $strURL;
        } else
            return null;
    }

    //Lấy tên từ session
    public function getfullname($key)
    {
        if ($this->session->has($key)) {
            $arrLogin = $this->session->get($key);
            if (count($arrLogin) > 0) {
                if ($arrLogin['name'])
                    return $arrLogin['name'];
                else
                    return false;
            } else return false;
        } else
            return false;
    }

    public function logout($key)
    {
        if ($this->session->has($key)) {
            unset($_SESSION[$key]);
            return true;
        } else
            return false;
    }




    ///
    ///
    /// Dưới là cấu trúc dữ liệu mẫu
    /* $product = [
        'id'=>'3',
        'tensp' => 'SP02',
        'gia'  => '140000',
        'giamgia'  => "3",
        'soluong'  => 1,             
    ]; */

   /*  arrCart = [
        [0] =>[
            'id'=>'3',
            'tensp' => 'SP03',
            'gia'  => '140000',
            'giamgia'  => "3",
            'soluong'  => 1,             
        ],
        [1]=>[
            'id'=>'4',
            'tensp' => 'SP04',
            'gia'  => '140000',
            'giamgia'  => "0",
            'soluong'  => 1,             
        ],
        [2]=>[
            'id'=>'5',
            'tensp' => 'SP05',
            'gia'  => '140000',
            'giamgia'  => "3",
            'soluong'  => 1,             
        ]
    ] */


    ///
    public function addCart($product = null, $key)
    {

        if ($this->session->has($key)) {
            $arrCart = $this->session->get($key);
            //Kiểm tra
            $flag = 0;
            foreach ($arrCart as &$item) {
                if ($item["id"] == $product['id']) {
                    $flag = 1;
                    $item["soluong"] = $item["soluong"] + 1;
                    break;
                }
            }
            if ($flag == 0) //Không tìm thấy mã sản phẩm thì thêm sản phẩm mới vô giỏ hàng
            {
                $arrCart[] = $product;
            }

            unset($_SESSION[$key]);
            $this->session->set($key, $arrCart);
        } else {
            $this->session->set($key, array($product));
        }
    }


    //Lấy dữ liệu từ giỏ hàng
    public function getCart($key)
    {

        if ($this->session->has($key)) {
            return $this->session->get($key);
        } else {
            return null;
        }
    }



    public function updateSoluongItem($key = null, $id = null, $soluong = 0)
    {
        if ($key != null && $id != null && $soluong > 0) {
            if ($this->session->has($key)) {
                $arrCart = $this->session->get($key);
            
                //Kiểm tra             
                foreach ($arrCart as &$item) {
                    if ($item["id"] == $id) {
                        $item["soluong"] = $soluong;
                        break;
                    }
                }
                unset($_SESSION[$key]);
                $this->session->set($key, $arrCart);
                return true;
            } else
                return false;
        } else
            return false;
    }

    public function removeItemCart($key, $id)
    {
        if ($this->session->has($key)) {
            $arrCart = $this->session->get($key);
            //Kiểm tra
            foreach ($arrCart as $keyitem => &$item) {
                if ($item["id"] == $id) {
                    //unset($arrCart[$keyitem]);
                    array_splice($arrCart, $keyitem, 1);
                    break;
                }
            }
            unset($_SESSION[$key]);
            $this->session->set($key, $arrCart);
            return true;
        } else
            return false;
    }

    public function deleteCart($key)
    {
        if ($this->session->has($key)) {
            unset($_SESSION[$key]);
            return true;
        } else
            return false;
    }

    public function getCountProductInCart($key) //Trả về số lượng sản phẩm nằm trong giỏ hàng
    {
        
        if ($key != null) {
            if ($this->session->has($key)) {
                $arrCart = $this->session->get($key);
                if($arrCart != null)
                {
                    return count($arrCart);
                }
                else
                    return 0;
                 
            } else
                return 0;
        } else
            return 0;
    }




}
