<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ng_record extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ng_records';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idng_record';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idng_master', 'idprod_actual', 'ng_qty'];

    
}
