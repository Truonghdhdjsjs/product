<?php

namespace App\Controllers;

use App\Libraries\MySession;
use Config\MyConfig;

class MyController extends BaseController
{

    function is_logged_in()
    {
        $mySess = new MySession();
        $myConfig = new MyConfig();
        if($mySess->checkLogin($myConfig->keyLogin))
        {
            return true;
        }
        else {
           return false;            
        }
    }
}
