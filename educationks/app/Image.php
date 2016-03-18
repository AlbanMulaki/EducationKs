<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
	protected $table = 'images';

    protected $fillable = ['image'];

    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    public function products()
    {
        return $this->belongsTo('App\Post','image_post');
    }
}
