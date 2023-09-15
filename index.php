<?php
include_once "includes/ini.php";

$jobs = new Jobs;

$frontPage = new Template("temps/front.php");

//if there is $_GET['category'] in the link => then set the value to $category variable
$cat_id = isset($_GET['cat_id']) && is_numeric($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;

// $checkCategory = $jobs->checkItem("SELECT * FROM categories WHERE id = $cat_id");

$checkCategory = $jobs->checkItem("SELECT * FROM categories WHERE id = $cat_id");

if($checkCategory > 0){
	$jobsByCat = $jobs->selectSingleQuery("SELECT name FROM categories WHERE id = $cat_id");
	$frontPage->jobsTitle = $jobsByCat->name . " Jobs";
	$frontPage->jobs = $jobs->getByCategory($cat_id);
}else{
	$frontPage->jobsTitle = "Latest Jobs";
	$frontPage->jobs = $jobs->getAllJobs();
}
	



$frontPage->cats = $jobs->selectSetQuery("SELECT * FROM categories");
echo $frontPage;

// echo $jobsTitle; // no echo!! => undefined variable


?>

