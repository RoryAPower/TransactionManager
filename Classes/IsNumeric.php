<?php

/**
 *
 */
class IsNumeric implements Validation {

	public function validate ($value)
	{
		return is_numeric($value);
	}

	public function getMessage($field)
	{
		return 'Please enter a numeric value in  the '.$field.' field';
	}
}

?>