<?php

class Template{
	
	protected $temp_path; // path to template
	protected $vars = array(); // the array that we'er gonna extract() our variables form

	function __construct($temp_path){ $this->temp_path = $temp_path; } // Setting the path to our template

	//here if we tryed to assign new key value to the object, this two functions are for this work.
	function __get($key){ return $this->vars[$key]; } // assigning array key
	function __set($key, $val){ $this->vars[$key] = $val; } // assigning array value

	function __toString(){  // __toString is called when we try to print our object => calling the object as string
		extract($this->vars); // extract our variables from our array
		ob_start(); // Strat output buffering
		include_once "temps/header.php"; 
		include_once $this->temp_path;
		include_once "temps/footer.php";
		return ob_get_clean(); // printing our buffered output and clean buffering
	}
}


?>
