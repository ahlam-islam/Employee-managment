<?php

include "../connection.php";


$name =$_POST["name"];
$email=$_POST['email'];
$password=$_POST["password"];
$city =$_POST["city"];
$gender =$_POST["gender"];
$phone= $_POST['phone'];
$birthday=$_POST['birthday'];


$query="INSERT INTO employees (name , email , password , phone , city , gander , birthday )
VALUES ('$name' , '$email' , '$password' , '$phone' , '$city' , '$gender' , '$birthday' )
";
if ($conn->query($query) === TRUE) {
    header("location: ../viewEmployees.php");
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
  
  $conn->close();







?>