<?php

namespace Larashop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place_id',
        'health_insurance_id',
        'name',
        'phone',
        'phone_2',
        'email',
        'date',
    ];
}
