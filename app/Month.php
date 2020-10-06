<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Month extends Model
{
    //
    use SoftDeletes;

    protected $table = 'months';

    protected $fillable = [
        'month', 'budget', 'outflow', 'balance'
    ];

    public function budgets()
    {
        $this->hasMany('App\Budget');
    }

    public function outflows()
    {
        $this->hasMany('App\Outflow');
    }

    public function reports()
    {
        $this->hasMany('App\Report');
    }
}
