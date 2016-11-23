<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prod_cycle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prod_cycles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idprod_cycle';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cycle_date', 'machine_no', 'shot', 'start', 'end', 'duration', 'note'];


}
