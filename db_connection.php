<?php
error_reporting(E_ALL ^ E_WARNING); 
error_reporting(E_ERROR | E_PARSE);

$host="localhost";
$dbname = "student_profile";
$user="root";
$password="";

$conn=mysqli_connect($host,$user,$password,$dbname);

if(!$conn)
{
    die("<br>Failed to connect :( <br>" . mysqli_connect_error() . "<br>");
}
else
{
    // echo "<br>Connected to Database: <u>" . $dbname . "</u> :D<br>";
}

?>