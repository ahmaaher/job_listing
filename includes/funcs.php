<?php

function redirect($link = null, $msg = null, $msg_type = null){
	if(is_string($link) && !empty($link)){ $location = $link; }else{ $location = $_SERVER['PHP_SELF']; }
	//assign message to session varible
	if(!empty($msg)){ $_SESSION['msg'] = $msg; }
	//assign type
	if(!empty($msg_type)){ $_SESSION['msg_type'] = $msg_type; }
	header("Location: " . $location); exit;
}

function getRedirectMsg(){
	if(!empty($_SESSION['msg'])){
		if(!empty($_SESSION['msg_type'])){

			if($_SESSION['msg_type'] == "error"){
				echo "<div class='alert alert-danger'>" . $_SESSION['msg'] . "</div>";
			}else{ echo "<div class='alert alert-success'>" . $_SESSION['msg'] . "</div>"; }
			
			unset($_SESSION['msg']);
			unset($_SESSION['msg_type']);
		}
	}
}