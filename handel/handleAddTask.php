<?php

include "../connection.php";

$id=$_POST["emp_id"];
$name =$_POST["task_name"];
$desc=$_POST["desc"];
$status =$_POST["status"];
$deadline =$_POST["deadline"];


$query="INSERT INTO tasks (emp_id ,task_name , description , status , deadline)
VALUES ((SELECT id FROM employees WHERE name = '$id') ,'$name' , '$desc' , '$status' , '$deadline')
";
if ($conn->query($query) === TRUE) {
    header("location: ../allTasks.php");
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
  
  $conn->close();







?>