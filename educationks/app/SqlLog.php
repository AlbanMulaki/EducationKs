<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SqlLog extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sql_log';

    use SoftDeletes;

    protected $dates = ['deleted_at'];


}
