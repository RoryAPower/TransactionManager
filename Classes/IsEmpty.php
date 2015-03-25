<?php


/**
 *
 */
class IsEmpty implements Validation {

	public function validate ($value){
		return empty($value);
	}

	public function getMessage($field)
	{
		return "Please fill in the ".$field.' field';
	}
}
?>