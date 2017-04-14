<?php

namespace Larashop\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'time',
        'text_home',
        'text_orientation',
        'text_about',
        'contact_email',
    ];

    public $schedules = [
            1 => '07:00',
            2 => '07:30',
            3 => '08:00',
            4 => '08:30',
            5 => '09:00',
            6 => '09:30',
            7 => '10:00',
            8 => '10:30',
            9 => '11:00',
            10 => '11:30',
            11 => '12:00',
            12 => '12:30',
            13 => '13:00',
            14 => '13:30',
            15 => '14:00',
            16 => '14:30',
            17 => '15:00',
            18 => '15:30',
            19 => '16:00',
            20 => '16:30',
            21 => '17:00',
            22 => '17:30',
            23 => '18:00',
            24 => '18:30',
            25 => '19:00',
            26 => '19:30',
            27 => '20:00',
    ];

    public function getSchedulesArray()
    {
        $schedule = Self::first();
        $schedule = json_decode($schedule->time, true);

        if (!$schedule) {
           return [];
        }

        return $schedule;
    }

    public function getSchedulesKeyValueEqual()
    {
        $schedules = $this->getSchedulesArray();
        $schedules_new = [];

        foreach ($schedules as $key => $schedule) {
            $schedules_new[$schedule] = $schedule;
        }

        return $schedules_new;
    }
}
