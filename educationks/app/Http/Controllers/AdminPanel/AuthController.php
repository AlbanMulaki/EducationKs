<?php

namespace App\Http\Controllers\AdminPanel;

use App\Users;
use Validator;
use App\Enum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller {

    /**
     * User info detail
     * @var type 
     */
    private $user = null;

    /**
     *  Allowed Group role to access this object
     *  Enum::"role"
     * @var type 
     */
    private $allowed_role = array(Enum::ADMINISTRATOR, Enum::MODERATOR);
    private $allowed_status = false;

    public function __construct() {
        //User info
        if (Session::get('id')) {
            $this->user = Users::getUserById(Crypt::decrypt(Session::get('id')));
        }
        // Check if the group role is allowed to access the object
        foreach ($this->allowed_role as $role) {
            if ($this->user['role_group'] == $role) {
                $this->allowed_status = true;
            }
        }
        view()->share("Enum", Enum::class);
    }

    public function getIndex() {
        if ($this->allowed_status == true) {
            return Redirect::action('AdminPanel\DashboardController@getIndex');
        }
        return view('layouts.login');
    }

    public function getLogout() {
        Session::flush();
        return Redirect::action('AdminPanel\AuthController@getIndex');
    }

    public function postLogin() {
        $valid = Validator::make(Input::all(), [
                    'username' => 'required|min:5',
                    'password' => 'required|min:5']);

        if ($valid->passes()) { // Validate entry
            $username = Input::get('username');
            $login = Users::getUser($username);
            if ($login === true) {// If the user doesnt exist exist
                return Redirect::back()
                                ->withInput()
                                ->with('status', Lang::get('errors.login_failed'))
                                ->with('login', "Username: " . $username . " it doesnt exist.")
                                ->withErrors($valid);
            }
            $check_login = Hash::check(Input::get('password'), $login->password);

            /**
             * Login Successful 
             */
            if ($check_login) {// login successful
                request()->session()->put('user', Crypt::encrypt($login->username));
                request()->session()->put('password', Crypt::encrypt($login->password));
                request()->session()->put('id', Crypt::encrypt($login->id));
                request()->session()->put('language', $login->language);

                if ($login->usersRole[0]['id'] >= Enum::EDITOR && $login->usersRole[0]['id'] <= Enum::EDITOR_RUSSIAN) {
                    return Redirect::action('AdminPanel\PostsController@getIndex');
                }
                return Redirect::action('AdminPanel\DashboardController@getIndex');
            } else {// Password not correct
                return Redirect::back()
                                ->withInput()
                                ->with('status', Lang::get('errors.login_failed'))
                                ->with('login', "Password: is not correct.")
                                ->withErrors($valid);
            }
            return Redirect::back()->withInput()->with('status', Lang::get('errors.login_failed'))->withErrors($valid);
        } else {
            return Redirect::back()->withInput()->with('status', Lang::get('errors.login_failed'))->withErrors($valid);
        }
    }

    public function getProfile() {
        return Users::getRoleGroup(Crypt::decrypt(Session::get('user')));
    }

}
