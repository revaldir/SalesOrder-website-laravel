<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function budgets()
    {
        return $this->hasMany('App\Budget');
    }

    public function outflows()
    {
        return $this->hasMany('App\Outflow');
    }

    public function reports()
    {
        $this->hasMany('App\Report');
    }
}
