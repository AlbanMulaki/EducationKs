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
use App\Category;
use App\Attachment;
use Illuminate\Support\Facades\Storage;
use App\Classes\LogSystem;
use Illuminate\Support\Facades\Event;

class CategoryController extends Controller {

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
        LogSystem::start();

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
     * @return type
     */
    public function getIndex() {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }
        $category = Category::all();
        
        $categoryPaginate = Category::paginate(8)->setPath("");
        return view('pages.admin.category.list', [
            'category' => $category,
            'categoryPaginate' => $categoryPaginate,
            'Enum' => Enum::class,
            'role' => UsersRole::all()]);
    }

    /**
     * Create new category
     * Access: Administrator, Super Administrator
     * @return type
     */
    public function postCreate() {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }

        $valid = Validator::make(Input::all(), [
                    'name_en' => 'required',
                    'description_en' => 'required',
                    'slug_en' => 'required'
        ]);
        if ($valid->passes()) {

            $category = new Category();
            $category->create(Input::all());

            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.success_add_category', ["argument" => ucfirst(Input::get('name_en'))]))
                            ->with('status-notification', "success")
                            ->withErrors($valid);
        } else {
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.validation_failed', ["argument" => ucfirst(Input::get('name_en'))]))
                            ->with('status-notification', "error")
                            ->withErrors($valid);
        }
    }

    /**
     * 
     * Edit Category
     * Access: All Role
     * @return type
     */
    public function getEdit($id) {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }

        try {
            $categoryEdit = Category::find($id);
            $category = Category::all();
            return view('pages.admin.category.edit', [
                'categoryEdit' => $categoryEdit,
                'category' => $category
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect::back()
                            ->withInput()
                            ->with('status', Lang::get('errors.error_category_doesnt_exist', ['argument' => $id]))
                            ->with('status-notification', "error");
        }


        //echo (date("m-d-Y h:i:s O", strtotime($expiryDateUTC)));
    }

    public function postUpdate($id) {

        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }
        $valid = Validator::make(Input::all(), [
                    'name_en' => 'required',
                    'description_en' => 'required',
                    'slug_en' => 'required'
        ]);

        if ($valid->passes()) {
            $category = Category::find($id);

            $category->name_ee = Input::get('name_ee');
            $category->name_en = Input::get('name_en');
            $category->name_lv = Input::get('name_lv');
            $category->name_lt = Input::get('name_lt');
            $category->name_ru = Input::get('name_ru');
            $category->description_en = Input::get('description_en');
            $category->description_ee = Input::get('description_ee');
            $category->description_lv = Input::get('description_lv');
            $category->description_lt = Input::get('description_lt');
            $category->description_ru = Input::get('description_ru');

            // update feature image
            $valid = Validator::make(Input::all(), [
                        'feature_image' => 'required'
            ]);
            if ($valid->passes()) {
                $img = Input::file('feature_image');
                $filenameWithoutDir = date("d_m_Y_") . "_" . str_random(6) . $img->getClientOriginalName();
                $filename = Enum::EDUCATIONKS_STORAGE . $filenameWithoutDir;
                $storage = Storage::disk('publicdisk')->put(
                        $filename, file_get_contents($img->getRealPath())
                );
                $column = array(
                    "file_dir" => Enum::EDUCATIONKS_STORAGE,
                    "file_name" => $filenameWithoutDir,
                    "file_size" => $img->getClientSize(),
                    "file_type" => $img->getMimeType()
                );
                $attachment = Attachment::create($column);
                $category->feature_image = $attachment->id;
            }

            $category->slug_en = Input::get('slug_en');
            $category->slug_ee = Input::get('slug_ee');
            $category->slug_lv = Input::get('slug_lv');
            $category->slug_lt = Input::get('slug_lt');
            $category->slug_ru = Input::get('slug_ru');
            $category->category_id = Input::get('category_id');

            $category->save();
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.successful_updated', ["argument" => Input::get('name_en')]))
                            ->with('status-notification', "success");
        } else {
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error");
        }
    }

    /**
     * Delete user 
     * Access: Super Administrator
     * @param type $id
     * @return type
     */
    public function getDelete($id) {

        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }

        if (is_numeric($id) && $id > 0) {//validation pass
            try {
                $cat = Category::with('posts')->findOrFail($id);
                $cat->posts()->delete();
                $cat->delete();
                return Redirect::action('AdminPanel\CategoryController@getIndex')->withInput()
                                ->with('status', Lang::get('errors.success_deleted', ["argument" => $cat->name_en]))
                                ->with('status-notification', "success");
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return Redirect::action('AdminPanel\CategoryController@getIndex')
                                ->withInput()
                                ->with('status', Lang::get('errors.error_category_doesnt_exist', ['argument' => $id]))
                                ->with('status-notification', "error");
            }
        } else {
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error");
        }
    }

    /**
     * Delete user 
     * Access: Super Administrator
     * @param type $id
     * @return type
     */
    public function getDeleteAttachment($id) {

        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }

        if (is_numeric($id) && $id > 0) {//validation pass
            try {
                $iamge = Attachment::findOrFail($id);
                $iamge->delete();

                $cat = Category::findOrFail($id);
                $cat->feature_image = 0;
                $cat->save();
                return Redirect::back()->withInput()
                                ->with('status', Lang::get('errors.success_deleted', ["argument" => $cat->name_en]))
                                ->with('status-notification', "success");
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return Redirect::action('AdminPanel\CategoryController@getIndex')
                                ->withInput()
                                ->with('status', Lang::get('errors.error_image_doesnt_exist', ['argument' => $id]))
                                ->with('status-notification', "error");
            }
        } else {
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error");
        }
    }

}
