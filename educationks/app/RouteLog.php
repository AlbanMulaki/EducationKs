<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteLog extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'route_log';

    use SoftDeletes;

    protected $fillable = [
        'url',
        'name',
        'action',
        'input_data'
        ];
    protected $dates = ['deleted_at'];


}
