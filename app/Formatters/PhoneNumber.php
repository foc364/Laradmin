<?php

namespace Larashop\Formatters;

class PhoneNumber 
{
	public function stripSpecialChars($phone = null)
	{
		if (!$phone) {
			return;
		}

		return str_replace(['(', ')', '-', ' '], '', $phone);
	}

	public function displayPhoneFormatted($phone = null)
	{
		if (!$phone) {
			return;
		}

		return "(".substr($phone, 0, 2).") ".substr($phone, 2, 4)."-".substr($phone, 6);
	}
}





