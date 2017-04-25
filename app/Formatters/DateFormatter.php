<?php

namespace Larashop\Formatters;

use Carbon;

class DateFormatter 
{
	public function makeDateTime($date = '', $time = '00:00')
	{
		if (!$date) {
			return;
		}

		return Carbon::createFromFormat('d/m/Y H:i', sprintf('%s %s', $date, $time))
				->toDateTimeString();
	}

	public function BrToDefaultDate($date = '') 
	{
		if (!$date) {
			return;
		}

		if ($this->isBrDate($date)) {
			return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
		}
		
		return $date;
	}

	public function isBrDate($date = '')
	{ 
	   return preg_match("^\\d{1,2}/\\d{2}/\\d{4}^", $date);
	} 
}