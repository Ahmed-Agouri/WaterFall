<?php
include ("config.php");
session_start();
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
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-primary" style="height: 70px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="Home.php">
            <i class="fas fa-home"></i>
            Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="Editprofile.php">
          <i class="fas fa-user"></i></i>Profile
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Post.php">
            <i class="fas fa-image"></i></i> Post   
          </a>
        </li>
        <li class="nav-item  ">
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
//Retrieving userInformation Profile Image
$query = $conn->query("SELECT * FROM userProfile where User_Email_address='".$_SESSION["email"]."'");
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){

             $imageURL = 'Profile_images/'.$row["User_Profile_image"];
             $UserName = $row["UserName"];
             
    
              
    }
} 
?>
<!-- //Displaying userName and ProfileImage of logged in user.   -->
<div class="UserInformationHome">
<p><?php echo $UserName;?></p>
<img src="<?php echo $imageURL; ?>" alt="User Profile image" width="200" height = "200"  />
</div>


<?php
//Retrieving UsersID
$email = $_SESSION["email"];
$sqlGetUserID = "SELECT UserID FROM userProfile WHERE User_Email_address='$email'";
    $result = mysqli_query($conn, $sqlGetUserID);
    $row = mysqli_fetch_assoc($result);
    $userID = $row['UserID'];

?>



  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php
$query = $conn->query("SELECT * FROM Media_Information WHERE UserID = '$userID' ORDER BY User_image_upload_time DESC");
$i = 0;
      if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
          $PostURL = 'User_Posts/'.$row["Post_image_path"];
          $caption = $row["Post_Caption"];
          $Post_Time = $row["User_image_upload_time"];
          if ($i == 0) {
            echo '<div class="carousel-item active">';
          } else {
            echo '<div class="carousel-item">';
          }
          echo '<img class="d-block w-100" src="'.$PostURL.'" alt="'.$caption.'">';
          echo '<div class="carousel-caption d-none d-md-block">';  
          echo '<h5>'.$caption.'</h5>';
          echo '<h4>'. $Post_Time.'</h4>';  
          echo '</div>';
          echo '</div>';
          $i++;
        }
      }
      ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

  <?php
require("./include/Footer.html")
  ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>