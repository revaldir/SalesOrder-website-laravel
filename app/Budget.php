<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
    //

    protected $table = 'budgets';


    protected $fillable = [
        'month_id', 'value', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function month()
    {
        return $this->belongsTo('App\Month');
    }

    public function reports()
    {
        $this->hasMany('App\Report');
    }
}
