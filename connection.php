<?php

$servername = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "employee_management";

$conn = new mysqli($servername , $dbuser , $dbpassword , $dbname);

if($conn-> connect_error)
{
    die("details".$conn->connect_error);
}


?>