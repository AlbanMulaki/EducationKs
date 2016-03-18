<?php

namespace App\Http\Controllers\AdminPanel;

use App\Users;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Enum;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use App\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\Classes\LogSystem;

class DashboardController extends Controller {

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
    private $allowed_role = array(Enum::ADMINISTRATOR,
        Enum::SUPER_ADMINISTRATOR,
        Enum::EDITOR,
        Enum::EDITOR_ENGLISH,
        Enum::EDITOR_ESTONIAN,
        Enum::EDITOR_LATVIA,
        Enum::EDITOR_LITHUANIA,
        Enum::EDITOR_RUSSIAN);
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

        //Generate How many post have category
        $category = Category::all();
        $catagoryJson = null;
        $catagoryArray = array();
        foreach ($category as $value) {
            try {
                $catagoryArray[] = array("label" => $value['name_' . app()->getLocale()],
                    "value" => $value->posts->count());
            } catch (\Exception $e) {
                LogSystem::start(true);
            }
        }
//        return $category;
        $catagoryJson = collect($catagoryArray)->toJson();


        return view('pages.admin.index', ['categoryJsonPostNum' => $catagoryJson]);
    }

}
