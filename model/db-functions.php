<?php
/**
 * Created by PhpStorm.
 * User: PCC
 * Date: 2/15/2018
 * Time: 10:33 AM
 */

require("/home/btorresm/config.php");


function connect()
{
    try
    {
        $dbh = new PDO("mysql:dbname=btorresm_grc", "btorresm_grcuser", "Lince2017");
        //echo "<p>Connected to database!</p>";
        return $dbh;
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getStudents()
{
    //gives access to the variable in index
    global  $dbh;

    //1. Define the query
    $sql = "SELECT * FROM student ORDER BY last, first";

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters

    //4.Execute statement
    $statement->execute();

    //5. Return the results
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);

    return $result;
}

function addStudent($sid, $last, $first, $birthdate, $gpa, $advisor)
{
    global $dbh;
    //1. define the query
    $sql = "INSERT INTO student
            VALUES (:sid, :last, :first, :birthdate, :gpa, :advisor)";
    //2. prepare the statement
    $statement = $dbh->prepare($sql);
    //3. bind parameters
    $statement->bindParam(':sid', $sid, PDO::PARAM_STR);
    $statement->bindParam(':last', $last, PDO::PARAM_STR);
    $statement->bindParam(':first', $first, PDO::PARAM_STR);
    $statement->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
    $statement->bindParam(':gpa', $gpa, PDO::PARAM_STR);
    $statement->bindParam(':advisor', $advisor, PDO::PARAM_STR);
    //4. execute the statement
    $success = $statement->execute();
    //5. return the result
    return $success;
}

function getStudent($sid)
{
    //gives access to the variable in index
    global  $dbh;

    //1. Define the query
    $sql = "SELECT last, first, sid, gpa  FROM student WHERE sid = :sid";

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters
    $statement->bindParam(':sid', $sid, PDO::PARAM_STR);

    //4.Execute statement
    $statement->execute();

    //5. Return the results
    $result = $statement->fetch();
//    print_r($result);

    return $result;
}