<?php

namespace App\Http\Controllers\AdminPanel;

use App\Enum;
use App\Http\Controllers\Controller;
use App\Options;
use App\Users;
use App\Advertising;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;

class AdvertisingController extends Controller {

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
        $ads = Advertising::getAll();
        return view('pages.admin.advertising.advertising', ['ON' => Enum::ON,
            'OFF' => Enum::OFF,
            'ads' => $ads,
            'firstElement' => true]);
    }

// echo (date("Y-d-m G:i:s", strtotime(Input::get('date')))); to UTC
//        echo (date("Y-d-m h:i:s A", strtotime($utc))); to AM PM
    public function postSave($id = 0) {
        //print_r(Input::all());

        $valid = Validator::make(Input::all(), [
                    'expiry_date' => 'required',
                    'name' => 'required',
                    'ads_content' => 'required']);


        if ($valid->passes()) {//update ads
            
            $expiryDateUTC = date("Y-m-d H:i:s", strtotime(Input::get('expiry_date')));
            
            $ads = Advertising::find($id);
            $ads->expiry_date = $expiryDateUTC;
            $ads->name = Input::get('name');
            
            //Update active
            $validactive = Validator::make(Input::all(),['active' => 'required']);
            if($validactive->passes()){
                $ads->active = Input::get('active');
            }
            
            $ads->ads_content = Input::get('ads_content');
            $ads->save();
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.successful_updated',['argument'=>$ads->name]))
                            ->with('status-notification', "success")
                            ->withErrors($valid);
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error")
                            ->withErrors($valid);
        }



        //echo (date("m-d-Y h:i:s O", strtotime($expiryDateUTC)));
    }

}
