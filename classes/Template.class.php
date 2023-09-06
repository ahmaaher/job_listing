<?php

class Template{
	
	protected $temp_path;
	protected $vars = array();

	function __construct($temp_path){ $this->temp_path = $temp_path; }

	//here if we tryed to assign new key value to the object, this to functions are for this work.
	function __get($key){ return $this->vars[$key]; }
	function __set($key, $val){ $this->vars[$key] = $val; }

	function __toString(){
		extract($this->vars);
		ob_start();
		include_once "temps/header.php";
		include_once $this->temp_path;
		include_once "temps/footer.php";
		return ob_get_clean();
	}
}


?>