<?php
$errors = array(); 
require_once("config.php");
session_start();


// LOGIN USER
if (isset($_POST['Emailaddress']) && isset($_POST['password'])) {

  $Emailaddress = mysqli_real_escape_string($conn, $_POST['Emailaddress']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
  $query = "SELECT * FROM User_Authentication WHERE EmailAddress='$Emailaddress'";  
  if ($results = mysqli_query($conn, $query)) {
    if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_assoc($results);
      $hashed_password = $row['User_password'];
      if (password_verify($password, $hashed_password)) {
        $_SESSION['email'] = $Emailaddress;
        $_SESSION['success'] = "You are now logged in";
        header('Location: Home.php');
      } else {
        array_push($errors, "Wrong username/password combination");
        $message = '<script>alert("Incorrect password Please try again");history.go(-1);</script>';
        echo $message;  
      }
    } else {
      array_push($errors, "Wrong username/password combination");
      $message = '<script>alert("Incorrect Email Please try again");history.go(-1);</script>';
      echo $message;  
    }
  } else {
    echo "Error: " . mysqli_error($conn);
  }

}
?>
 

