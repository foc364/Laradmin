<?php

namespace Larashop\Models;

use Illuminate\Database\Eloquent\Model;

class HealthInsurance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'name',
    ];
}
