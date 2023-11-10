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
        <li class="nav-item ">
          <a class="nav-link" href="Home.php">
            <i class="fas fa-home"></i>
            Home<span class="sr-only"></span></a>
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
        <li class="nav-item active ">
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
  


<?php

//Retrieving UsersID
$email = $_SESSION["email"];

//Retrieving UsersID using prepared statement
$stmt = $conn->prepare("SELECT UserID FROM userProfile WHERE User_Email_address = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_assoc($result);
$userID = $row['UserID'];

//Retrieving Friends posts
$friendPosts = array();
$sql = "SELECT User_ID2 FROM friendsList WHERE UserID = $userID";
$result = $conn->query($sql);
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $FriendUserId = $row["User_ID2"];

        $query = $conn->query("SELECT * FROM Media_Information WHERE UserID = '$FriendUserId' ORDER BY User_image_upload_time DESC");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $friendPosts[] = $row;
                $ImageUploadTime = $row['User_image_upload_time'];
            }
        }
    }
}

?>

<div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        foreach ($friendPosts as $post) {
            //Retrieve friendsUsernameFor Their Post
            $sql = "SELECT UserName FROM userProfile WHERE UserID = {$post['UserID']}";
            $result = $conn->query($sql);
            if ($result === false) {
                die("Error executing query: " . $conn->error);
            }
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $FriendUserName = $row["UserName"];
                }
            }
            ?>
            <div class="carousel-item <?php echo ($i == 0) ? 'active' : ''; ?>">
                <img class="d-block w-100" src="<?php echo 'User_Posts/' . $post['Post_image_path']; ?>" alt="<?php echo $post['Post_Caption']; ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo $post['Post_Caption']; ?></h5>
                    <h4>User Name : <?php echo $FriendUserName; ?></h4>
                    <p>Image Posted on: <?php echo $ImageUploadTime; ?></p>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>
  
    <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
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