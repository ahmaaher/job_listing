<?php
include_once "includes/ini.php";
$jobs = new Jobs;

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$data = array();
	$data['job_title'] 	 = $_POST['job_title'];
	$data['company'] 	 = $_POST['company'];
	$data['cat_id'] 	 = $_POST['cat_id'];
	$data['description'] = $_POST['description'];
	$data['salary'] 	 = $_POST['salary'];
	$data['location'] 	 = $_POST['location'];
	$data['user'] 		 = $_POST['user'];
	$data['email'] 		 = $_POST['email'];

	if($jobs->create($data)){
		redirect("index.php", "Your job has been listed", "success");
	}else{
		redirect("index.php", "Something went wrong", "error");
	}

}


$createJob = new Template("temps/create_job.php");

$createJob->cats = $jobs->selectSetQuery("SELECT * FROM categories");
echo $createJob;

?>
