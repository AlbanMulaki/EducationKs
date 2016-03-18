<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post';
    
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    
    public function user() {
        return self::hasOne('App\Users', 'id', 'user_id');
    }
    public function category() {
        return self::hasOne('App\Category', 'id', 'category_id');
    }
    public function postImage() {
        return self::hasMany('App\PostImage', 'post_id', 'id');
    }
    public function featureImage() {
        return self::hasOne('App\Attachment', 'id', 'feature_image');
    }
    
}
