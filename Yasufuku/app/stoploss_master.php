<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stoploss_master extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stoploss_masters';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idsl_master';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['reason'];

    
}
