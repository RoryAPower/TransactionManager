<?php


/**
 *
 */
class IsAlpha implements Validation {

	public function validate ($value){
		return !is_numeric($value);
	}

	public function getMessage($field)
	{
		return 'Please enter an alphabetic value in  the '.$field.' field';
	}
}
?>