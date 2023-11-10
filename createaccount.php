<?php
session_start();
require_once("config.php");
//retriving form data
$email = $_POST['email'];
$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$DOB = $_POST['DOB'];
$password =  $_POST['password'];

//Checking User email exists or not
$sql_check = "SELECT * FROM User_Authentication WHERE EmailAddress = '$email'";
$result_check = mysqli_query($conn, $sql_check);
if (mysqli_num_rows($result_check) > 0) {
    $message = '<script>alert("The email address you are trying to use has already been registered. Please use a different email address to proceed.");history.go(-1);</script>';
    echo $message; 
    exit();
}

//Hashing password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


//saving form data to database

$sql1 = "INSERT INTO userProfile (User_Email_address , User_First_name , User_Last_name, User_DOB ) VALUES  ('$email' , '$First_Name' , '$Last_Name' , '$DOB')"; 
$sql2 = "INSERT INTO User_Authentication ( EmailAddress , User_password , User_status) VALUES ('$email' , '$hashed_password' , 'Active' )";
$_SESSION['name'] = $First_Name."_".$Last_Name;

$_SESSION["email"] = $email;
  if (mysqli_query($conn , $sql1)) {

  echo "account created";
} else {   
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
if (mysqli_query($conn , $sql2)) {
    echo "done";
 } else { 
     echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
 }  
 header("Location: Otpsender2.php?email=".$email);









?>