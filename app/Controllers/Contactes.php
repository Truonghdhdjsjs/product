<?php

namespace App\Controllers;

use App\Models\ContactesModel;

class Contactes extends MyController
{
    public function index()
    {

        $Contactes = new ContactesModel();
        $data['dieu_khoang'] = $Contactes->getAll();
        return view('frontend/ContactesAdmin', $data);
    }


}
