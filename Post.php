<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
 <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="height: 70px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="Home.php">
            <i class="fas fa-home"></i>
            Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="Editprofile.php">
          <i class="fas fa-user"></i></i>Profile
        </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="Post.php">
            <i class="fas fa-image"></i></i> Post   
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="FriendsPosts.php">
            <i class="fas fa-image"></i> Friends Posts
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="Friends.php">
            <i class="fas fa-user-friends"></i> Friends
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="Logout.php">
            Logout
          </a>
        </li>
      </ul>
    </div>
    <div class="Navname">
       <span class="navbar-text">Waterfall</span>
    </div>
   
  </nav>
<body>
 

  <div class="ProfilepageBodyContainer"> 
  <div class="register-photo"> 
        <div class="form-container">
    <form action="PostImage.php" method="post" enctype="multipart/form-data">
    Select Image To Post :
    <div class = "form-group"><input type="file" name="file" required><button type="submit" name="submit"> Upload</button> </div>
    <div class="form-group"><input class="form-control" type="text" required name="Caption" placeholder="Caption Your Image"></div>
</form> 
</div>
</div>

  </div>



<?php
require("./include/Footer.html")
  ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>