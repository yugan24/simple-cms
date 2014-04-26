<?php

namespace App\Controllers\Admin;

use App\Models\Profile;
use Sentry;

class HomeController extends BaseController {

    private $data = array();

    public function index() {

        $this->view('admin.index');
//        //echo Sentry::getUser()->profile->name;
//        $profile = new Profile(array('name' => 'Ravi'));
//        Sentry::getUser()->profile()->save($profile);
    }

}
