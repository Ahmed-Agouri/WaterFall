<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    <div class="register-photo">
        <div class="form-container">
            <form method="post" action="Profilecreate.php">
                <h2 class="text-center"><strong>Create</strong> your profile.</h2>
                <div class="form-group"><input class="form-control" type="text" required name="User_Name" placeholder="User Name"></div>
                <div class="form-group"><input class="form-control" type="text" required name="Bio" placeholder="Add a short bio to tell people more about yourself"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Create profile</button></div>
           </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>