<?php

namespace App\Models;

use Cartalyst\Sentry\Users\Eloquent\User as SentryModel;

class User extends SentryModel {

    protected $table = 'users';
    protected $hidden = array('password');

    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getReminderEmail() {
        return $this->email;
    }

    public function profile() {
        return $this->hasOne('App\Models\Profile');
    }

}
