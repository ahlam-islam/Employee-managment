<?php
include "connection.php";

$id = $_GET['task_id'];

// sql to delete a record
$sql = "DELETE FROM tasks WHERE task_id='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: allTasks.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();






?>