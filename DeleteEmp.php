<?php
include "connection.php";

$id = $_GET['task_id'];

// sql to delete a record
$sql = "DELETE FROM employees WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: viewEmployees.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();






?>