<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enum;
use Illuminate\Support\Facades\Crypt;
use App\Users;

class ImagesController extends Controller {

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
    private $allowed_role = array(Enum::administrator);
    private $allowed_status = false;

    public function __construct() {
        //User info
        if (Session::get('id')) {
            $user = Users::getUserById(Crypt::decrypt(Session::get('id')));
            $this->user = $user->toArray();
        }
        // Check if the group role is allowed to access the object
        foreach ($this->allowed_role as $role) {
            if ($this->user['group'] == $role) {
                $this->allowed_status = true;
            }
        }
    }
    public function save()
    {
        $user = User::findOrFail($id);

        Storage::put(
            'avatars/'.$this->user['id'],
            file_get_contents($request->file('avatar')->getRealPath())
        );
        //return Storage::disk('local')->
        //$storagePath = storage_path('app/images/users/' . $user_id . '/' . $slug);
        //return Image::make($storagePath)->response();
    }
}