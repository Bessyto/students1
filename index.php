<?php


//Error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);


//Require the autoload file
require_once ('vendor/autoload.php');

//Create an instance of the Base
$f3 = Base::instance();
$f3->set("DEBUG", 3);

//user has to run 328/hello
//Passing Variables to a Template
$f3->route('GET /', function() {
    echo "hello";
}
);

//Run Fat-Free
$f3->run();