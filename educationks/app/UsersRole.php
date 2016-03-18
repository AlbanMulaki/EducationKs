<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersRole extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_role';
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public function getAll(){
        return self::all();
    }
    public function users() {
        return self::belongsTo('App\Users','id','role_group');
    }
    
    
}
