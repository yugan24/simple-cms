<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\BaseController;
use Cartalyst,
    Input,
    Sentry;

class AuthController extends BaseController {

    protected $layout = 'admin.layouts.default';

    public function __construct() {
        $throttleProvider = Sentry::getThrottleProvider();
        $throttleProvider->enable();
    }

    public function getLogin() {
        $this->view('admin.auth.login');
    }

    public function postLogin() {
        $errorMsg = '';
        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        try {
            $user = Sentry::authenticate($credentials, false);
            if ($user) {
                return $this->redirectRoute('admin.index');
            }
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            $errorMsg = 'Please enter user name';
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            $errorMsg = 'Please enter password.';
        } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
            $errorMsg = 'Invaild username or password, try again.';
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            $errorMsg = 'User was not found.';
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            $errorMsg = 'User is not activated.';
        } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            $errorMsg = 'User is suspended.';
        } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
            $errorMsg = 'User is banned.';
        } catch (\Exception $e) {
            
        }
        return $this->redirectRouteWithError('admin.login', array('login' => $errorMsg));
    }

    public function getLogout() {
        Sentry::logout();
        return $this->redirectRoute('admin.login');
    }

}
