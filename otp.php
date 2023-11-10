<?php
session_start();
if(isset($_POST['One_time_password'])){
    if($_POST['One_time_password'] == $_SESSION['otp']){
        header("Location: ProfileimageForm.php");
    }
    else{
        echo '<script>alert("Wrong Password , Go back and try again")</script>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="register-photo"> 
        <div class="form-container">
            <form method="Post" action="otp.php"> 
                <h2 class="text-center">Check your Registerd email for your One time password.</h2>
                <div class="form-group"><input class="form-control" type="text" name="One_time_password" placeholder="One time Password"></div>
                <div class="form-group">
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit"> <strong>Submit</strong> </button></div>
 
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>