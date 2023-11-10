<?php
include("config.php");
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
        <li class="nav-item">
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
        <li class="nav-item ">
          <a class="nav-link" href="FriendsPosts.php">
            <i class="fas fa-image"></i> Friends Posts
          </a>
        </li>
        <li class="nav-item active ">
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
<?php 
$email = $_SESSION["email"];
$sqlGetUserID = "SELECT UserID FROM userProfile WHERE User_Email_address='$email'";
    $result = mysqli_query($conn, $sqlGetUserID);
    $row = mysqli_fetch_assoc($result);
    $userID = $row['UserID'];


if (isset($userID) && isset($_POST['remove'])) {
   $sqlCheckFriend = "SELECT * FROM friendsList WHERE UserID = $userID AND User_ID2 IN (SELECT UserID FROM userProfile WHERE UserName = '$friendUsername')";
  $result = mysqli_query($conn, $sqlCheckFriend);
    
  $usernameToRemove = $_POST['username'];
  $sqlGetUserId = "SELECT UserID FROM userProfile WHERE UserName = '$usernameToRemove'";
  $userIdResult = $conn->query($sqlGetUserId);
  if ($userIdResult->num_rows > 0) {
    $userIdRow = $userIdResult->fetch_assoc();
    $friendUserId = $userIdRow['UserID'];
    $sqlDeleteFriend = "DELETE FROM friendsList WHERE UserID = $userID AND User_ID2 = $friendUserId";
    if ($conn->query($sqlDeleteFriend) === TRUE) {
      $message = '<script>alert("Successfully Removed Friend");history.go(-1);</script>';
      echo $message; 
      echo "Error removing friend: ";

      
     
    } else {
      
      echo "Error removing friend: " . $conn->error;
    }
  } else {
    //echo "No user found with username " . $usernameToRemove;
  }
 } else {
//   echo "Error: User ID not found or 'remove' not set";
 }
 ?>



<?php
// select data from friendsList table
$sql = "SELECT User_ID2 FROM friendsList Where UserID = $userID";
$result = $conn->query($sql);

// check if any rows were returned
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $FriendUserId = $row["User_ID2"];
    $sqlGetUsername = "SELECT UserName FROM userProfile WHERE UserID = '$FriendUserId'";
    $usernameResult = $conn->query($sqlGetUsername);
    if ($usernameResult->num_rows > 0) {
      $usernameRow = $usernameResult->fetch_assoc();
      $friendUsername = $usernameRow['UserName'];
      $usernames[] = $friendUsername;
      
    } else {
      echo "No username found for user ID " . $FriendUserId . "<br>";
    }
  }
} else {
 // echo "No friends found";

}
?>
<table class="table-friends">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Delete </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usernames as $username) { ?>
      <tr>
        <td><?php echo $username; ?></td>
        <td><form method="POST">
  <input type="hidden" name="username" value="<?php echo $username; ?>">
  <button type="submit" name="remove">Remove</button>
</form></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<div class="FriendSearch">
<form method="POST">
  <label for="username">Search for a user:</label>
  <input type="text" required name="username" id="username">
  <button type="submit" name="addFriend">Add friend</button>
</form>


<?php
if(isset($_POST['addFriend'])) {
    $username = $_POST['username'];


    $sql = "SELECT UserName FROM userProfile WHERE UserName = '$username'";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $friend_username = $row['UserName'];

      
      $sql = "SELECT UserId FROM userProfile WHERE UserName = '$friend_username'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $user2ID = $row['UserId'];
  
      $sql = "INSERT INTO friendslist (UserID, User_ID2) VALUES ('$userID', '$user2ID')";
        mysqli_query($conn, $sql);
        header("Location: ".$_SERVER['REQUEST_URI']);
        exit();
    } else {
      
        echo "User not found.";
    }
}







?>

</div>

<?php
?>

</div>
<?php
require("./include/Footer.html")
  ?>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>