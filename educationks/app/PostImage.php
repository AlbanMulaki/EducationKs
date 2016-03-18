<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostImage extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_image';
    
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    // Relation
    public function galleryImage() {
        return self::hasOne('App\GalleryImage', 'id', 'gallery_image_id');
    }
    
}
