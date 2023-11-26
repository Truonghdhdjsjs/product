<?php

namespace App\Controllers;

class HomeAdmin extends MyController
{

    public function index()
    {
        
        if($this->is_logged_in())
        {
            return view('admin/home');
        }
        else
        {
            $data = ['errors' => []];
            return view('admin/login', $data);
        }
        
    }
}
