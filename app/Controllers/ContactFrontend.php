<?php

namespace App\Controllers;

use App\Models\ContactModel;

class ContactFrontend extends MyController
{
    public function index()
    {

        $contact = new ContactModel();
        $data['contact'] = $contact->getAll();
        return view('frontend/contact', $data);
    }


}