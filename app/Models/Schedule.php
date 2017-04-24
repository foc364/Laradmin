<?php

namespace Larashop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon;
use DB;

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

    public function getSchedulesAvailable($date = '')
    {
        if (!$date) {
            return;
        }

        $schedules = $this->where(DB::raw('DATE(date)'), $date)->get()->pluck('date');

        $formatedSchedules = [];

        foreach ($schedules as $schedule) {
            $formated = Carbon::createFromFormat('Y-m-d H:i:s', $schedule)->format('H:i');
            $formatedSchedules[$formated] = $formated;
        }

        return $this->removeSchedulesFromArray($formatedSchedules);
    }

    public function getSchedulesKeyValueEqual()
    {
        $schedules_new = [];

        foreach ($this->schedules as $key => $schedule) {
            $schedules_new[$schedule] = $schedule;
        }

        return $schedules_new;
    }

    private function removeSchedulesFromArray($schedules = [])
    {
        $scheduleList = $this->getSchedulesKeyValueEqual();

        foreach ($schedules as $scheduleRemove) {
            unset($scheduleList[$scheduleRemove]);
        }

        return $scheduleList;
    }

    public function getScheduleOptionFormat($date = '')
    {
        $scheduleList = $this->getSchedulesAvailable($date);
        $scheduleOptions = '';

        if (!is_array($scheduleList)) {
            return '<option value="">Agenda lotada</option>';
        }
    
        foreach ($scheduleList as $key => $schedule) {
            $scheduleOptions .= sprintf('<option value="%s">%s</option>', $schedule, $schedule);
        }

        return $scheduleOptions;
    }
}
