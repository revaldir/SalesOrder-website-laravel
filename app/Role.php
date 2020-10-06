<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name', 'is_active'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
