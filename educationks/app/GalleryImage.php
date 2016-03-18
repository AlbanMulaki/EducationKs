<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery_image';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    // Relation
    public function album() {
        return self::hasOne('App\GalleryAlbum', 'id', 'album_id');
    }
    public function attachment() {
        return self::hasOne('App\Attachment', 'id', 'attachment_id');
    }
    public function postImage() {
        return self::hasOne('App\PostImage', 'gallery_image_id', 'id');
    }

}
