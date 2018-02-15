<?php


//Error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);


//Required files
require_once ('vendor/autoload.php');
require_once ('model/db-functions.php');

session_start();

//Create an instance of the Base
$f3 = Base::instance();
$f3->set("DEBUG", 3);

//call the connect function from de-functions file
$dbh = connect();

//user has to run 328/hello
//Passing Variables to a Template
$f3->route('GET /', function($f3) {

    $students = getStudents();
    $f3->set('students', $students);

   //Load template
    $template = new Template();
    echo $template -> render('views/all-students.html');
}
);

//Run Fat-Free
$f3->run();