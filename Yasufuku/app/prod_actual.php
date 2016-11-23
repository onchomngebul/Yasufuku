<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prod_actual extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prod_actuals';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idprod_actual';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idprod_plans', 'operator_no', 'leader_no',
    'aplan_qty', 'aplan_shot',
    'aplan_time', 'aprod_qty', 'aprod_shot',
    'performance', 'stop_loss', 'ot_ratio', 'ql_ratio', 'ng',
    'total_hours','total_qty','material_lot'
];

    public function thisPlan() {
        return $this->hasOne('App\prod_plan', 'idprod_plans'); // this matches the Eloquent model
    }

    public function stopLoss()
    {
        return $this->hasMany('App\stoploss_record', 'idprod_actual');
    }

    public function NGs()
    {
        return $this->hasMany('App\ng_record', 'idprod_actual');
    }
}
