<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $timestamps = false;
    protected $table = 'reports';

    protected $fillable = [
        'month_id', 'category_id', 'budget', 'outflow'
    ];

    public function budget()
    {
        $this->belongsTo('App\Budget');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function month()
    {
        return $this->belongsTo('App\Month');
    }

    public function outflow()
    {
        $this->belongsTo('App\Outflow');
    }
}
