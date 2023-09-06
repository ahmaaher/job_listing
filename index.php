<?php
include_once "includes/ini.php";
$jobs = new Jobs;

$obj = new Template("temps/front.php");
$obj->jobs = $jobs->getAll();
echo $obj;



// echo $title; // no echo!! => undefined variable


?>

