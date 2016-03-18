<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryAlbum extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery_album';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    // Relation
    public function gallery() {
        return self::hasOne('App\Gallery', 'id', 'gallery_id');
    }

    public function galleryImage() {
        return self::hasMany('App\GalleryImage', 'album_id', 'id');
    
        
    }
    
}
