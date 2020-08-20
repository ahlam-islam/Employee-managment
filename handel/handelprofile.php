<?php
include "../connection.php";
session_start();


//clean data
function validtion($input)
{
    $input = htmlspecialchars($input);
    $input = trim($input);
    return $input;
}



//get data
$name = $_POST["firstName"];
$email = $_POST["email"];
$password = $_POST['password'];
$city = $_POST["city"];
$gender = $_POST["gender"];
$phone = $_POST['phone'];

$name = validtion($name);
$email = validtion($email);
$password = validtion($password);
$city = validtion($city);
$gender =validtion($gender);
$phone = validtion($phone);

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
    $errors['data']="please enter a valid password";
    $chack=false;
}

if(strlen($phone) >11 and strlen($phone) <11  and $phone= "")
{
    $errors['data']="please enter a valid phone";
    $chack=false;
}



// get data from database
$oldemail = $_SESSION['email'];


$query = "UPDATE employees
SET name = '$name' , email ='$email',  password= '$password', phone = '$phone'  , city=  '$city' , gander = '$gender'
WHERE email= '$oldemail'
";

$result = $conn->query($query);

//check data

$_SESSION['errors']=$errors;

if(isset($_SESSION['errors']))
{
    header('location:../myProfile.php');
}

if($chack===true)
{
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    header('location:../myProfile.php');
}




?>