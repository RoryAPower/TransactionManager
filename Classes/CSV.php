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

	function getFile() {
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
					$fileArray[] = array($line[0], $line[1], $line[2], $line[3]);
			}
		}
		else {
			//do something better here
			echo "Not working";
		}
		//close the stream
		fclose($handle);

		return $fileArray;
	}

	public function addToFile($values)
	{

	}
}
?>