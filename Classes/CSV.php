<?php

/**
 *
 */
class CSV {

	private $file, $writeAccess;
	private $fileArray = array();

	function __construct($file, $writeAccess) {
		$this -> file = $file;
		$this -> writeAccess = $writeAccess;
	}

	public function getFile()
	{
		return $this -> file;
	}

	public function getBalance()
	{
		//go through the file and get the last balance
		//return it
		$balance = 0;
		//open the file
		$handle = fopen($this -> file, $this -> writeAccess);
		if ($handle) {
			//return the last balance
			while ($line = fgetcsv($handle, 0, ',')) {
					//got the array
					$balance =  $line[4];
			}
		}
		//close the stream
		fclose($handle);

		return $balance;
	}

	function getFileContents() {
		//open the file with write access
		$handle = fopen($this -> file, $this -> writeAccess);
		if ($handle) {
			//fgetcsv takes 3 params
			//the handle
			//length default to 0 no limit
			//delimiter , in this case
			//this while loop will return a new array each time
			while ($line = fgetcsv($handle, 0, ',')) {
					//got the array
					$fileArray[] = array($line[0], $line[1], $line[2], $line[3], $line[4]);
			}
		}
		//close the stream
		fclose($handle);

		return $fileArray;
	}


	//seperator and enclosure optional
	//seperator default comma
	//enclosure - no idea
	//"/r" - puts in the newline
	public function addToFile($fields)
	{
		$formArray = (array)$fields;
		$handle = fopen($this -> file, $this -> writeAccess, "/r");
		if($handle){
			fputcsv($handle, $formArray);
		}
		//close the stream
		fclose($handle);
		//dont need to return anything;
	}
}
?>