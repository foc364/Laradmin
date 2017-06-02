<?php

namespace Larashop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Larashop\Formatters\DateFormatter;
use Larashop\Models\Config;
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
        'type',
        'health_insurance_id',
        'name',
        'phone',
        'phone_2',
        'email',
        'date',
        'time',
        'observation',
    ];

    public $schedules = [
            '07:00' => '07:00',
            '07:20' => '07:20',
            '07:40' => '07:40',
            '08:00' => '08:00',
            '08:20' => '08:20',
            '08:40' => '08:40',
            '09:00' => '09:00',
            '09:20' => '09:20',
            '09:40' => '09:40',
            '10:00' => '10:00',
            '10:20' => '10:20',
            '10:40' => '10:40',
            '11:00' => '11:00',
            '11:20' => '11:20',
            '11:40' => '11:40',
            '12:00' => '12:00',
            '12:20' => '12:20',
            '12:40' => '12:40',
            '13:00' => '13:00',
            '13:20' => '13:20',
            '13:40' => '13:40',
            '14:00' => '14:00',
            '14:20' => '14:20',
            '14:40' => '14:40',
            '15:00' => '15:00',
            '15:20' => '15:20',
            '15:40' => '15:40',
            '16:00' => '16:00',
            '16:20' => '16:20',
            '16:40' => '16:40',
            '17:00' => '17:00',
            '17:20' => '17:20',
            '17:40' => '17:40',
            '18:00' => '18:00',
            '18:20' => '18:20',
            '18:40' => '18:40',
            '19:00' => '19:00',
            '19:20' => '19:20',
            '19:40' => '19:40',
            '20:00' => '20:00',
    ];

    public function formatScheduleKeyValueEqual($scheduleList = '')
    {
        if (!is_array($scheduleList)) {
            return;
        }

        $schedules_new = [];

        foreach ($scheduleList as $key => $schedule) {
            $schedules_new[$schedule] = $schedule;
        }

        return $schedules_new;
    }

    private function removeSchedulesFromArray($scheduleConfig = [], $scheduleUsed = [])
    {

        foreach ($scheduleUsed as $scheduleRemove) {
            unset($scheduleConfig[$scheduleRemove]);
        }

        return $scheduleConfig;
    }

    public function getScheduleAvailableOptionFormat($date = '')
    {
        $scheduleList = $this->getSchedulesAvailableByDate($date);
        $scheduleOptions = '';

        if (!is_array($scheduleList)) {
            return '<option value="">Agenda lotada</option>';
        }
    
        foreach ($scheduleList as $key => $schedule) {
            $scheduleOptions .= sprintf('<option value="%s">%s</option>', $schedule, $schedule);
        }

        return $scheduleOptions;
    }

    public function getSchedulesAvailableByDate($date = '')
    {
        if (!$date) {
            return;
        }

        $date = (new DateFormatter)->BrToDefaultDate($date);

        $scheduleConfig = (new Config)->getScheduleConfig();
        $scheduleConfig = $this->formatScheduleKeyValueEqual($scheduleConfig);

        $scheduleUsed = $this->getScheduleUsedByDate($date);

        if (empty($scheduleUsed)) {
            return  $scheduleConfig;
        }

        return $this->removeSchedulesFromArray($scheduleConfig, $scheduleUsed);
    }

    public function getScheduleUsedByDate($date)
    {
        $schedules = $this->where('date', $date)->get();

        if ($schedules->isEmpty()) {
            return;
        }

        foreach ($schedules as $schedule) {
            foreach (json_decode($schedule->time) as $time) {
                $formatedSchedules[$time] = $time;
            }
        }
     
        return $formatedSchedules;
    }
}
