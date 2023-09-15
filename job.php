<?php
include_once "includes/ini.php";

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['edit'])){ // Edit page
	$job_id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;

	$jobs = new Jobs;
	$job_single = new Template("temps/job_edit.php");

	$checkJob = $jobs->checkItem("SELECT * FROM jobs WHERE id = $job_id");
	if($checkJob > 0){
		// getting the job data into job object
		$job_single->job = $jobs->selectSingleQuery("SELECT * FROM jobs WHERE id = $job_id");
		// getting all categories
		$job_single->cats = $jobs->selectSetQuery("SELECT * FROM categories");
	}
	echo $job_single;

}elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])){  // Update page
	
	$jobs = new Jobs;
	$job_id = $_POST['id'];

	$data = array();
	$data['job_title'] 	 = $_POST['job_title'];
	$data['company'] 	 = $_POST['company'];
	$data['cat_id'] 	 = $_POST['cat_id'];
	$data['description'] = $_POST['description'];
	$data['salary'] 	 = $_POST['salary'];
	$data['location'] 	 = $_POST['location'];
	$data['user'] 		 = $_POST['user'];
	$data['email'] 		 = $_POST['email'];

	if($jobs->update($job_id, $data)){
		redirect("?id=$job_id", "Your job has been Updated", "success");
	}else{
		redirect("?id=$job_id", "Something went wrong", "error");
	}

}elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])){  // Delete page
	$jobs = new Jobs;
	$job_id = $_POST['id'];

	if($jobs->delete($job_id)){
		redirect("index.php", "Your job has been Deleted", "success");
	}else{
		redirect("index.php", "Something went wrong", "error");
	}
}else{

	$jobs = new Jobs;
	$job_single = new Template("temps/job_single.php");

	//if there is $_GET['id'] in the link => then set the value to $job_id variable
	$job_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : NULL;

	// if the value of the $_GET['id'] is numirec
	if(is_numeric($job_id)){
		//Check if there is a job with this id
		$checkJob = $jobs->checkItem("SELECT * FROM jobs WHERE id = $job_id");
		if($checkJob > 0){
			// getting the job data into job object
			$job_single->job = $jobs->selectSingleQuery("SELECT * FROM jobs WHERE id = $job_id");
		}
	}
	//getting the category of the object
	$job_single->category = $jobs->selectSetQuery("SELECT * FROM categories");
	echo $job_single;

}





?>