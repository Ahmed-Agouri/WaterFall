<?php
session_start();
// Include the database configuration file
include 'config.php';
$statusMsg = '';
$user_name = $_SESSION['name'];
$email = $_SESSION['email'];
$sqlGetUserID = "SELECT UserID FROM userProfile WHERE User_Email_address='$email'";
    $result = mysqli_query($conn, $sqlGetUserID);
    $row = mysqli_fetch_assoc($result);
    $userID = $row['UserID'];
// File upload path
$targetDir = "User_Posts/";
// $fileName = basename($_FILES["file"]["name"]);
$fileName = time() . '_' . basename($_FILES["file"]["name"]);

// $saveName = $_SESSION["name"];
$targetFilePath = $targetDir . $fileName ;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
            $postCaption = $_POST['Caption'];
            echo $postCaption;
            // Insert image file name into database
            $insert = $conn->query("INSERT INTO Media_Information (Post_image_path, UserID, Post_Caption, User_image_upload_time) VALUES ('".$fileName."', '".$userID."','".$postCaption."' , NOW())"); 
            echo $targetFilePath."  ";
            if($insert){

                $statusMsg = "The file ". $fileName . " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
            
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = '<script>alert("Please go back and upload Image");history.go(-1);</script>';
echo $statusMsg;
}

// Display status message
$Messge = '<script>alert("The post has been successfully uploaded");history.go(-1);</script>';
echo $Messge;
echo $statusMsg;
?>
