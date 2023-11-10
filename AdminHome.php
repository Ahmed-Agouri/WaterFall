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
    <title>Admin Home page</title>
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
          <a class="nav-link" href="AdminHome.php">
            <i class="fas fa-home"></i>
            Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="AdminUserPolicy.php">
          <i class="fas fa-user"></i></i>User Policy
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
<div class="AdminHomepage">
<p>Hello Admin</p>
</div>

<div class="adminpostcontainer">
    <?php
    $query = $conn->query("SELECT * FROM Media_Information ORDER BY User_image_upload_time DESC");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $friendPosts[] = $row;
        }
    }
    foreach ($friendPosts as $post) {
        echo '<div class="adminPost">';
        echo '<img class="adminPost-image" src="User_Posts/' . $post['Post_image_path'] . '" alt="' . $post['Post_Caption'] . '">';
        echo '<p class="adminPost-caption"> User ID :'  . $post['UserID'] . '</p>';    
        echo '<p class="adminPost-caption"> Post ID :' . $post['Post_ID'] . '</p>';    
        echo '<p class="adminPost-caption">' . $post['Post_Caption'] . '</p>';
        echo '<p class="adminPost-time">' . $post['User_image_upload_time'] . '</p>';?>
        <form action="AdminDeletePost.php" method="POST">
        <input type="hidden" name="Post_ID" value="<?php echo $post['Post_ID']; ?>">
        <button type="submit" class="adminbuttons btn btn-primary">Delete</button>
      </form>
      
     <?php   echo '</div>';
    }
    ?>  
    
</div>


  <?php
require("./include/Footer.html")
  ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>