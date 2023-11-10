<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <div class="register-photo"> 
        <div class="form-container">
            <div class="image-holder">
            </div>
            <form method="post" action="createaccount.php" onsubmit="return ValidateDob() && validateCheckbox()">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
                <div class="form-group"><input class="form-control" type="text" name="First_Name" placeholder="First name" required></div>
                <div class="form-group"><input class="form-control" type="text" name="Last_Name" placeholder="Last name" required></div>
                <div class="form-group"><input class="form-control" type="date" name="DOB" placeholder="Date of birth" required></div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" id="policy-checkbox"> I agree to the User Policy.</label> 
                     <a href="userPolicy.html">User Policy</a></div>
                  
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div>
                <a href="Login.php  " class="already">You already have an account? Login here.</a>
            </form>
        </div>
    </div>







    
    <script src="index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>