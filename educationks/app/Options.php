<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Options extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'options';
    
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    public static function getAll(){
        $obj = self::all();
        return $obj[0];
    }
    
    public static function getOptionsObject(){
        return self::all();
    }
    
}
