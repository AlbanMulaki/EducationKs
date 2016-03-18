<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DevicesLog extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'devices_log';

    use SoftDeletes;

    protected $dates = ['deleted_at'];


}
