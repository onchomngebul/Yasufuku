<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stoploss_record extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stoploss_records';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idsl_record';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idsl_master', 'idprod_actual', 'sl_duration'];

    
}
