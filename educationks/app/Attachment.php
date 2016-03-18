<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attachment';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    
    
    protected $fillable = [
        'file_dir',
        'file_name',
        'file_size',
        'file_type'];
    
    public static function getAll(){
        return self::all();
    }

}
