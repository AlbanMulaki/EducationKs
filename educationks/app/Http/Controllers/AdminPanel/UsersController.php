<?php

namespace App\Http\Controllers\AdminPanel;

use App\Enum;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Options;
use App\Users;
use App\Advertising;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Hash;
use App\UsersRole;

class UsersController extends Controller {

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
    private $allowed_role = array(Enum::ADMINISTRATOR, Enum::SUPER_ADMINISTRATOR);
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
        view()->share("users", $this->user);
    }

    /**
     * Get list of user and front of user module
     * Access: Administrator, Super Administrator
     * @return View
     */
    public function getIndex() {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }
        return view('pages.admin.users.list', ['list_users' => Users::orderBy('created_at', 'desc')->paginate()->setPath(""),
            'Enum' => Enum::class,
            'role' => UsersRole::all()]);
    }

    /**
     * Get list of user search
     * Access: Administrator, Super Administrator
     * @return View
     */
    public function getSearch() {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }
        $userList = Users::where('username', 'like', "%" . Input::get('username') . "%")
                        ->orderBy('username', 'asc')->paginate()->setPath("")->appends(['username' => Input::get('username')]);
        return view('pages.admin.users.list', ['list_users' => $userList,
            'Enum' => Enum::class,
            'role' => UsersRole::all()]);
    }

    /**
     * 
     * Add new user
     * Access: Administrator, Super Administrator
     * @return Processing
     */
    public function postCreate() {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }

        $valid = Validator::make(Input::all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'username' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                    'confirm_password' => 'required|same:password',
                    'role_group' => 'required']);
        if ($valid->passes()) {
            $user = new Users();
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->role_group = Input::get('role_group');
            $user->save();
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.success_add_user', ["argument" => ucfirst(Input::get('first_name')) . " " . ucfirst(Input::get('last_name'))]))
                            ->with('status-notification', "success")
                            ->withErrors($valid);
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error")
                            ->withErrors($valid);
        }
    }

    /**
     * 
     * Update user & Self update user 
     * Access: All Role
     * @return Processing
     */
    public function postUpdate() {


        //Exclude some role to access this method
        if (Enum::EDITOR <= $this->user['role_group'] && Enum::EDITOR_LATVIA >= $this->user['role_group']) {
            $this->allowed_status = true;
        }
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }
        if (Input::get('userid')) {
            $valid = Validator::make(Input::all(), [
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'email' => 'required',
                        'role_group' => 'required']);
        } else {
            $valid = Validator::make(Input::all(), [
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'email' => 'required']);
        }


        if ($valid->passes()) {//update user
            $selfUpdatedUsernmae = false;
            if (Input::get('userid')) {//Update from Administration
                $userEdit = Users::find(Input::get('userid'));
                $userEdit->first_name = Input::get('first_name');
                $userEdit->last_name = Input::get('last_name');
                $userEdit->email = Input::get('email');

                //Restrict user role update based on who edit
                if (Input::get('role_group') != Enum::SUPER_ADMINISTRATOR && ($this->user['role_group'] == Enum::SUPER_ADMINISTRATOR || $this->user['role_group'] == Enum::ADMINISTRATOR)) {
                    $userEdit->role_group = Input::get('role_group');
                } else {
                    if (Enum::SUPER_ADMINISTRATOR == Input::get('role_group') && $this->user['role_group'] == Enum::SUPER_ADMINISTRATOR) {
                        $userEdit->role_group = Input::get('role_group');
                    } else {
                        return Redirect::back()->withInput()
                                        ->with('status', Lang::get('errors.you_cant_update_role_user_super_administrator', ["user" => ucfirst(Input::get('first_name')) . " " . ucfirst(Input::get('last_name'))]))
                                        ->with('status-notification', "error")
                                        ->withErrors($valid);
                    }
                }

                if ($userEdit->username != Input::get('username') && Input::get('username') !== null) {
                    $userEdit->username = Input::get('username');
                    if ($this->user['id'] == Input::get('userid')) {
                        $selfUpdatedUsernmae = true;
                    }
                }
                if (Input::get('password') || Input::get('password') != "") {
                    $userEdit->password = Hash::make(Input::get('password'));
                }
//                $userEdit->language = Enum::
                $userEdit->save();
            } else {//Self update user
                $profile = Users::find($this->user->id);
                $profile->first_name = Input::get('first_name');
                $profile->last_name = Input::get('last_name');
                $profile->email = Input::get('email');
                if (Input::get('password') || Input::get('password') != "") {
                    $profile->password = Hash::make(Input::get('password'));
                }
                $profile->save();
            }
            if (Input::get('password') || Input::get('password') != "" || $selfUpdatedUsernmae == true) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.successful_updated', ["argument" => ucfirst(Input::get('first_name')) . " " . ucfirst(Input::get('last_name'))]))
                            ->with('status-notification', "success")
                            ->withErrors($valid);
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error")
                            ->withErrors($valid);
        }



        //echo (date("m-d-Y h:i:s O", strtotime($expiryDateUTC)));
    }

    /**
     * Delete user 
     * Access: Super Administrator
     * @param type $id
     * @return type
     */
    public function getDelete($id) {
        if ($this->user['role_group'] != Enum::SUPER_ADMINISTRATOR) {
            return Redirect::back();
        }

        if (is_numeric($id) && $id > 0) {//validation pass
            try {
                $user = Users::findOrFail($id);
                if (Enum::SUPER_ADMINISTRATOR != $user->role_group || $this->user['role_group'] == Enum::SUPER_ADMINISTRATOR) {
                    $user->delete();
                    return Redirect::back()->withInput()
                                    ->with('status', Lang::get('errors.success_deleted', ["argument" => $user->first_name . " " . $user->last_name]))
                                    ->with('status-notification', "success");
                } else {
                    return Redirect::back()
                                    ->withInput()
                                    ->with('status', Lang::get('errors.you_cant_delete_super_administrator'))
                                    ->with('status-notification', "warning");
                }
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return Redirect::back()
                                ->withInput()
                                ->with('status', Lang::get('errors.error_user_doesnt_exist'))
                                ->with('status-notification', "error");
            }
        } else {
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error");
        }
    }

}
