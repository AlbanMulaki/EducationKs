<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    // Relation
    public function album() {
        return self::hasMany('App\GalleryAlbum', 'gallery_id', 'id');
    }

}
