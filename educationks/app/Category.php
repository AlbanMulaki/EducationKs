<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enum;
class Category extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';
    protected $fillable = [
        'name_en',
        'name_ee',
        'name_lv',
        'name_lt',
        'name_ru',
        'description_en',
        'description_ee',
        'description_lv',
        'description_lt',
        'description_ru',
        'feature_image',
        'slug_en',
        'slug_ee',
        'slug_lv',
        'slug_lt',
        'slug_ru',
        'feature_image',
        'category_id'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function setSlugEnAttribute($value) {
        $this->attributes['slug_en'] = Enum::create_slug($value);
    }
    public function setSlugEeAttribute($value) {
        $this->attributes['slug_ee'] = Enum::create_slug($value);
    }
    public function setSlugLvAttribute($value) {
        $this->attributes['slug_lv'] = Enum::create_slug($value);
    }
    public function setSlugLtAttribute($value) {
        $this->attributes['slug_lt'] = Enum::create_slug($value);
    }

    public function setSlugRuAttribute($value) {
        $this->attributes['slug_ru'] = Enum::create_slug($value);
    }

    public static function getSubCategory($id) {
        return self::find($id);
    }

    public static function getFeatureImage($id) {
        return Attachment::find($id);
    }

    // Relation
    public function attachment() {
        return self::hasMany('App\Attachment', 'id', 'feature_image');
    }

    public function posts() {
        return self::hasMany('App\Post', 'category_id', 'id');
    }

}
