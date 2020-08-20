<?php
session_start();
include "../connection.php";


//clean data
function validtion($input)
{
    $input = htmlspecialchars($input);
    $input = trim($input);
    return $input;
}



//get data
$email = $_POST["email"];
$password = $_POST["password"];

$email = validtion($email);
$password = validtion($password);

$chack = true;
$errors = [];


//validtion data
if(!filter_var($email , FILTER_VALIDATE_EMAIL) and $email = "")
{
    $errors["email"] = "please enter a valid email";
    $chack = false;

}

if(strlen($password) <5 and strlen($password) > 10 and $password= "")
{
    $errors['data']="please enter a valid data";
    $chack=false;
}


// get data from database
$query = "SELECT * 
FROM `admins`
WHERE email = '$email'";

$result = $conn->query($query);

//check data
if( $result->num_rows == 0)
{
  $errors['data']="please enter a valid data";
  $chack=false;
}

while($rows = $result->fetch_assoc())
{
    if($rows['password'] != $password)
    {
        $errors["password"]= "please enter a valid password";
        $chack = false;
    }
}

$_SESSION['errors']=$errors;

if(isset($_SESSION['errors']))
{
    header('location:../admlogin.php');
}
if($chack===true)
{
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    header('location:../allTasks.php');
}




?>