<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outflow extends Model
{
    protected $table = 'outflows';

    protected $fillable = [
        'proyek', 'out_value', 'month_id', 'category_id', 'submitter'
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
        return $this->hasMany('App\Report');
    }

}
