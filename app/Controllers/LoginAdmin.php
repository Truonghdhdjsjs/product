<?php

namespace App\Controllers;

use Config\MyConfig; //import config
use App\Models\AdminModel;
use App\Libraries\MySession; // Import library


class LoginAdmin extends MyController
{
    public function login()
    {
        if($this->is_logged_in())
        {
            //return view('admin/home');
            return $this->response->redirect(site_url('/admin'));
        }
        else
        {
            $data = ['errors' => []];
            return view('admin/login', $data);
        }
    }

    public function sign()
    {
        $myconfig = new MyConfig; // Creating an instance
        $loginModel = new AdminModel();
        $username = $this->request->getVar('username');
        $pass = $this->request->getVar('password');

        $data = $loginModel->getUserByUsername($username);
        if ($data != null) {
            if ($data["username"] == $username && $pass == $data["password"]) {
                //Thêm vào session 
                //Thêm thông tin login vào session 
                $mySess = new mySession();
                $mySess->addLogin($myconfig->keyLogin, $data);

                return $this->response->redirect(site_url('/admin'));
            } else {
                $data = ['errors' => ['Tên đăng nhập hoặc mật khẩu không đúng!']];
                return view('admin/login', $data);
            }
        } else {
            //$data['errors'] = "Xin hãy nhập tên đăng nhập hoặc mật khẩu khác!";
            $data = ['errors' => ['Xin hãy nhập tên đăng nhập khác!']];
            return view('admin/login', $data);
            // return $this->response->redirect(site_url('/login'));
        }
    }

    public function logout()
    {
        //$mySess = new mySession();
        //$myconfig = new MyConfig; 
        //if($mySess->logout($myconfig->keyLogin))
        //    return $this->response->redirect(site_url('/'));
    }
}
