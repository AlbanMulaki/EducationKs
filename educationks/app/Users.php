<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = ['username', 'password'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucfirst($value);
    }
    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = ucfirst($value);
    }
    public function setUsernameAttribute($value) {
        $this->attributes['username'] = strtolower($value);
    }

    /**
     * 
     * @param type $user
     * @param type $pass (Hash)
     */
    public static function getUser($user) {
        $login = self::where('username', '=', $user)
                ->take(1)
                ->get();
        if (count($login) == 0) {
            return true;
        }
        return $login[0];
    }

    public static function getRoleGroup($users = 0) {
        $usr = self::getUser($users);
        return $usr->usersRole;
    }

    /**
     * 
     * @param type $user
     * @param type $pass (Hash)
     */
    public static function getUserById($id) {
        $login = self::where('id', '=', $id)
                ->take(1)
                ->get();
        if (count($login) == 0) {
            return true;
        }
        return $login[0];
    }

    // Relation
    public function usersRole() {
        return self::hasMany('App\UsersRole', 'id', 'role_group');
    }

}
