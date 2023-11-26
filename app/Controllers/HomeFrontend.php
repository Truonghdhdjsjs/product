<?php

namespace App\Controllers;

class HomeFrontend extends MyController
{
    public function __construct()
    {
        //parent::__construct();
    }
    public function index()
    {
        return view('frontend/home');
                
    }
}
