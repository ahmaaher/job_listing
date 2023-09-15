<?php

//Redirect function
function redirect($page = false, $msg = null, $msg_type = null){
	if(is_string($page)){
		$location = $page;
	}else{ $location = $_SERVER['SCRIPT_NAME']; }

	//Check for message
	if($msg != null){ $_SESSION['msg'] = $msg; }

	//Check for type
	if($msg_type != null){ $_SESSION['msg_type'] = $msg_type; }

	header('Location: ' . $location); exit;
}

//Display Message
function displayMessage(){
	if(!empty($_SESSION['msg'])){
		//Assign Message var
		$msg = $_SESSION['msg'];
		if(!empty($_SESSION['msg_type'])){
			//Assign message type var
			$msg_type = $_SESSION['msg_type'];
			//Creat Output
			if($msg_type == "error"){
				echo "<div class='alert alert-danger'>" . $msg . "</div>";
			}else{ echo "<div class='alert alert-success'>" . $msg . "</div>"; }
		}
		//Unset Message form session
		unset($_SESSION['msg']);
		unset($_SESSION['msg_type']);
	}else{ echo ""; }
}

?>