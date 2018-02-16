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

//call the connect function from db-functions file
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

//Route for add student
$f3->route('GET|POST /add', function($f3) {

    //print_r($_POST);
    /*
     * Array ( [sid] => 1010
     *          [last] => Popins
     *          [first] => Mary
     *          [birthdate] => 02/27/1990
     *          [gpa] => 4
     *          [advisor] => Mosh
     *          [submit] => Submit
     *        )
     */

    if(isset($_POST['submit'])) {
        //Get the form data
        $sid = $_POST['sid'];
        $last = $_POST['last'];
        $first = $_POST['first'];
        $birthdate = $_POST['birthdate'];
        $gpa = $_POST['gpa'];
        $advisor = $_POST['advisor'];
        //Validate the data
        //Add the student
        $success = addStudent($sid, $last, $first, $birthdate, $gpa, $advisor);
        if($success)
        {
            $student = new Student($sid, $last, $first, $birthdate,$gpa, $advisor);
            $_SESSION['student'] = $student;

            $f3->reroute('/summary/'.$sid);
        }
    }

    //Load template
    $template = new Template();
    echo $template -> render('views/add-student.html');
}
);

//Route to view summary
$f3->route('GET /summary/@sid', function($f3, $params)
{
    //Array ( [0] => Array
    //      ( [last] => Arndt
    //      [first] => Cameron ) )

    // Array (
    // [last] => Dole
    // [0] => Dole
    // [first] => Bob
    // [1] => Bob
    // [sid] => 880-12-2121
    // [2] => 880-12-2121
    // [gpa] => 3.5
    // [3] => 3.5 )

    $sid= $params['sid'];
    $student = getStudent($sid);
    $f3->set('student', $student);



    //Load template
    $template = new Template();
    echo $template -> render('views/view-student.html');
}
);


//Run Fat-Free
$f3->run();