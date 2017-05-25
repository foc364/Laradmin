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
        'health_insurance_id',
        'name',
        'phone',
        'phone_2',
        'email',
        'date',
    ];

    public $schedules = [
            '07:00' => '07:00',
            '07:30' => '07:30',
            '08:00' => '08:00',
            '08:30' => '08:30',
            '09:00' => '09:00',
            '09:30' => '09:30',
            '10:00' => '10:00',
            '10:30' => '10:30',
            '11:00' => '11:00',
             '11:30' => '11:30',
             '12:00' => '12:00',
             '12:30' => '12:30',
             '13:00' => '13:00',
             '13:30' => '13:30',
             '14:00' => '14:00',
             '14:30' => '14:30',
             '15:00' => '15:00',
             '15:30' => '15:30',
             '16:00' => '16:00',
             '16:30' => '16:30',
             '17:00' => '17:00',
             '17:30' => '17:30',
             '18:00' => '18:00',
             '18:30' => '18:30',
             '19:00' => '19:00',
             '19:30' => '19:30',
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
        $schedules = $this->where(DB::raw('DATE(date)'), $date)->get()->pluck('date')->toArray();

        if (empty($schedules)) {
            return;
        }

        foreach ($schedules as $schedule) {
            $formated = Carbon::createFromFormat('Y-m-d H:i:s', $schedule)->format('H:i');
            $formatedSchedules[$formated] = $formated;
        }

        return $formatedSchedules;
    }
}
