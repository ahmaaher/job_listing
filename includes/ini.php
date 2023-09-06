<?php
// include config file. Where we put some constants & configs
include "config.php";

function my_autoloader($class) {
    include_once 'classes/' . $class . '.class.php'; //here we didn't put '../classes' because this fun is being called from index file not from ini file
}
spl_autoload_register('my_autoloader');

?>