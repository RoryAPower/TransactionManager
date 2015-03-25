<?php


/**
 *
 */
class Page {

	//filenames
	//ran from index.php - no need to go back up the file tree
	private $header = 'header.php';
	private $footer = 'footer.php';

	private $title;

	function __construct($title) {
		$this -> title = $title;
	}


	function getHeader(){
		include $this -> header;
	}

	function getFooter(){
		include $this -> footer;
	}

	function getTitle(){
		return $this -> title;
	}
}

?>