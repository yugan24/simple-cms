<?php

namespace App\Controllers\Admin;

use App\Models\User;
use Sentry;

class UserController extends BaseController {

    private $data = array();

    public function index() {
        $this->data['users'] = Sentry::findAllUsers();
        $this->view('admin.users.index', $this->data);
    }

}
