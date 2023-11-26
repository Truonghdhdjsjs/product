<?php

namespace App\Controllers;

use App\Models\contactsmodel;

class contacts extends MyController
{
    public function index()
    {

        $contacts = new contactsmodel();
        $data['dieu_khoang'] = $contacts->getAll();
        return view('frontend/contactsmodel', $data);
    }


}