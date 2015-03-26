<?php

/**
 *
 */
class Form {

	private $incexp, $item, $category, $amount, $balance;

	public function __construct($incexp, $item, $category, $amount, $balance)
	{
		$this -> incexp = $incexp;
		$this -> item = $item;
		$this -> category = $category;
		$this -> amount = $amount;
		$this -> balance = $balance;
	}

	public function getIncExp()
	{
		return $this -> incexp;
	}

	public function getItem()
	{
		return $this -> item;
	}

	public function getCategory()
	{
		return $this -> category;
	}

	public function getAmount()
	{
		return $this -> amount;
	}

	function updateBalance(){
		if($this -> incexp == 'Income'){
			$this -> balance += $this -> amount;
		}
		else $this -> balance -= $this -> amount;
	}

}
?>