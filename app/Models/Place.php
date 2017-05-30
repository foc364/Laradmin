<?php

namespace Larashop\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'name',
        'address',
        'phone',
        'phone_2',
        'city',
    ];
}
