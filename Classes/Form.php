<?php

/**
 *
 */
class Form {

	private $incexp, $item, $category, $amount;

	public function __construct($incexp, $item, $category, $amount)
	{
		$this -> incexp = $incexp;
		$this -> item = $item;
		$this -> category = $category;
		$this -> amount = $amount;
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

}
?>