<?php

/**
 *
 */
class IncomeExpensesValidation implements Validation {



	public function validate($value){
		$incomeCat = array('Stock', 'PayCheck');
		$expenseCat = array('Food', 'Gas', 'Rent');
		if((in_array($value[1], $incomeCat) && $value[0] == 'Expense') || (in_array($value[1], $expenseCat) && $value[0] == 'Income')){
			return false;
		}
		else return true;
	}

	public function getMessage($field){
		//need to return a message based on income expense and category
		return 'Please note '.$field[1].' is not an '.$field[0].'.
		<br>Please change your selection.
		<br>Otherwise select Miscellaneous.';

	}
}

?>