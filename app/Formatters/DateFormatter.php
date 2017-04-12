<?php

namespace Larashop\Formatters;

use Carbon;

class DateFormatter 
{
	public function makeDateTime($date, $time = '00:00')
	{
		if (!$date) {
			return;
		}

		return Carbon::createFromFormat('d/m/Y H:i', sprintf('%s %s', $date, $time))
				->toDateTimeString();
	}
}