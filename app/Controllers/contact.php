<?php

namespace App\Controllers;

use App\Models\contactmodel;

class contact extends MyController
{
    public function index()
    {

        $contact = new contactmodel();
        $data['contact'] = $contact->getAll();
        return view('frontend/contactadmin', $data);
    }


}
