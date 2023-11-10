<?php
session_start();
include("config.php");
?>
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
    <script src="index.js"></script>
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
        <li class="nav-item active ">
          <a class="nav-link" href="Editprofile.php">
          <i class="fas fa-user"></i></i>Profile
        </a>
        </li>
        <li class="nav-item">
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
 
  <div class="BodyContainer">

<?php
$query = $conn->query("SELECT * FROM userProfile where User_Email_address='".$_SESSION["email"]."'");
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){

             $imageURL = 'Profile_images/'.$row["User_Profile_image"];
              
    }
}

$query = $conn->query("SELECT * FROM userProfile where User_Email_address='".$_SESSION["email"]."'");
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){

             $UserName = $row["UserName"];
             $UserBio = $row["User_Bio"];
             
    }
}

?>
<div class="ProfilepageBodyContainer">
<div class="UserInformationProfilepage">
<h1><?php echo $UserName; ?></h1>
<img src="<?php echo $imageURL; ?>" alt="User Profile image" width="300" height = "300"  /> 
<p><?php echo$UserBio; ?><p>
</div>

<div class="ProfileChange">
            <form method="post" action="Profilecreate.php" >
                <h2 class="text-center"><strong>Edit</strong> your profile.</h2>
                <div class="form-group"><input class="form-control" type="text" required name="User_Name" placeholder="User Name"></div>
                <div class="form-group"><input class="form-control" type="text" required name="Bio" placeholder="Add a short bio to tell people more about yourself"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Edit profile</button></div>
           </form>


<style>
   .hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; }
</style>
<iframe name="hiddenFrame" class="hide"></iframe>        
    <form action="profileImage.php" method="post" enctype="multipart/form-data" target="hiddenFrame"  onsubmit="setTimeout(function() { location.reload(); }, 1000);">
    Please choose an image for your new profile picture :
    <div class = "form-group"><input type="file" name="file" required><button type="submit" id="upload-button" name="submit" onclick="submitForm()"> Upload</button> </div>
</form> 
</div>
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