<?php

include "../connection.php";


$name =$_POST["emp_id"];
$date=$_POST["duedate"];
$task_id=$_GET['task_id'];



$query="UPDATE tasks 
SET deadline = '$date'
WHERE task_id=$task_id
";
if ($conn->query($query) === TRUE) {
    header("location: ../allTasks.php");
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
  
  $conn->close();







?>