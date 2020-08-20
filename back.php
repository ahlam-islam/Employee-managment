<?php
session_start();
include "connection.php";

$id = $_GET['task_id'];

$email = $_SESSION['email'];
$query = "UPDATE tasks
SET status = 'in process'
WHERE  task_id = '$id'";

if ($conn->query($query) === TRUE) {
    header('location: myTasks.php');
  } else {
    echo "Error deleting record: " . $conn->error;
  }

$result = $conn->query($query);





?>