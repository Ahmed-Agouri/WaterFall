<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Create</title>
</head>
<body>
    

<div class="register-photo"> 
        <div class="form-container">
    <form action="profileImage.php" method="post" enctype="multipart/form-data">
    Select Image For your profile picture :
    <div class = "form-group"><input type="file" name="file" required><button type="submit" name="submit"> Upload</button> </div>
</form> 
</div>
</div>




<?php
// Include the database configuration file
include 'config.php';


// Get images from the database 
$query = $conn->query("SELECT * FROM userProfile where User_Email_address='".$_SESSION["email"]."'");
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){

            // $imageURL = 'Profile_images/'.$row["User_Profile_image"];
    }
}

?>
  <!-- <img src="<?php echo $imageURL; ?>" alt="no image uploaded yet" width="200" height = "200" /> -->

   



</body>

</html>