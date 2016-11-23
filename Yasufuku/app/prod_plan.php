<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prod_plan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prod_plans';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idprod_plans';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
           'pp_date', 'shift', 'machine_no', 'employee_no',
           'order_seq', 'order_id', 'mold_no','mold_only', 'part_no', 'item_desc',
           'cav_no', 'cycle_tm', 'schedule_tm', 'pp_qty', 'pp_shot',
           'machine_grp', 'process_type', 'item_unit','paralel_process',
           'import_status'
    ];

    public function thisActual() {
        return $this->belongsTo('App\prod_actual');
    }
}
