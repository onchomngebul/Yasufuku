<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ng_master extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ng_masters';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idng_master';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['reason'];

    
}
