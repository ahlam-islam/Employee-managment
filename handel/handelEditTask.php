<?php

include "../connection.php";

$id=$_POST["emp_id"];
$name =$_POST["task_name"];
$desc=$_POST["desc"];
$status =$_POST["status"];
$deadline =$_POST["deadline"];
$task_id=$_GET['task_id'];



$query="UPDATE tasks 
SET task_name ='$name' , description = '$desc' ,status= '$status' , deadline = '$deadline'
WHERE task_id=$task_id
";
if ($conn->query($query) === TRUE) {
    header("location: ../allTasks.php");
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
  
  $conn->close();







?>