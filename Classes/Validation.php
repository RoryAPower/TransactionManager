<?php

interface Validation {
	public function validate($value);

	public function getMessage($field);
}
?>