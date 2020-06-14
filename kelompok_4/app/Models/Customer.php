<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['user_id ', 'image', 'name', 'phone', 'email', 'address'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function debts()
    {
        return $this->hasMany('App\Models\CustomerDebt');
    }
}
