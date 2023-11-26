<?php

namespace App\Controllers;

use App\Models\dieukhoangmodel;

class dieukhoang extends MyController
{
    public function index()
    {
        $dieukhoang = new dieukhoangmodel();
        $data['dieukhoan'] = $dieukhoang->getAll();
        return view('frontend/dieukhoan', $data);
    }
}