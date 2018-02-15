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

    require("/home/btorresm/config.php");

    try{
        $dbh=new PDO("mysql:dbname=btorresm_grc", "btorresm_grcuser", "Lince2017");
        echo "<p>Connected to database!</p>";
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

   //Load template
    $template = new Template();
    echo $template -> render('views/all-students.html');
}
);

//Run Fat-Free
$f3->run();