<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLog extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_log';

    use SoftDeletes;

    protected $dates = ['deleted_at'];


}
