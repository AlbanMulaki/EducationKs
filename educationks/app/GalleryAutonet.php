<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class GalleryAutonet extends Model {
 
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'an_pildid';
    
    protected $connection = "autonet";
    
    
    public $autonet_url = "http://pics.autonet.ee/";
    
    public $timestamps = false;
    
 
 
}
 