<?php

namespace App\Controllers\Admin;

use Controller;
use View,
    Redirect;

class BaseController extends Controller {

    protected $layout = 'admin.layouts.master';

    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    protected function view($path, array $data = []) {
        $this->layout->content = View::make($path, $data);
    }

    protected function redirectBack($data = []) {
        return Redirect::back()->withInput()->with($data);
    }

    public function redirectReferer() {
        $referer = Request::server('HTTP_REFERER');
        return Redirect::to($referer);
    }

    protected function redirectRoute($route, $data = []) {
        return Redirect::route($route, $data);
    }

    protected function redirectBackWithError($data = []) {
        return Redirect::back()->withInput()->withErrors($data);
    }

    protected function redirectRouteWithError($route, $error = []) {
        return Redirect::route($route)->withErrors($error);
    }

}
