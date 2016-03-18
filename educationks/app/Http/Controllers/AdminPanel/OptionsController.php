<?php

namespace App\Http\Controllers\AdminPanel;

use App\Users;
use App\Options;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Enum;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class OptionsController extends Controller {

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

    public function getIndex() {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }

        //$storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        //$has_error = array_keys($errors);
        //$logo = 
        $options = Options::getAll();
        return view('pages.admin.options', ['options' => $options]);
    }

    public function postSave() {
        $valid = Validator::make(Input::all(), [
                    'name' => 'required|string',
                    'email' => 'email',
                    'website' => 'required',
                    'footer' => 'required|string',
                    'logo' => 'sometimes|required',
                    'description' => 'required|string']);

        if ($valid->passes()) {

            //Update settings
            $option = Options::find(1);
            $option->name = Input::get('name');
            $option->email = Input::get('email');
            $option->website = Input::get('website');
            $option->footer = Input::get('footer');
            $option->description = Input::get('description');

            $valid = Validator::make(Input::all(), [
                        'logo' => 'required'
            ]);
            if ($valid->passes()) {
                $img = Input::file('logo');
                $filename = Enum::EDUCATIONKS_STORAGE . date("d_m_Y_") . "_" . str_random(6) . $img->getClientOriginalName();
                $storage = Storage::disk('publicdisk')->put(
                        $filename, file_get_contents($img->getRealPath())
                );
                $option->logo = $filename;
            }


            $option->save();

            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.successful_updated',['argument'=>'']))
                            ->with('status-notification', "success")
                            ->withErrors($valid);
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error")
                            ->withErrors($valid);
        }
    }

}
