<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertising extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'advertising';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public static function getAll(){
        return self::all();
    }

}
