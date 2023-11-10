<?php
session_start();
// Include the database configuration file
include 'config.php';
$statusMsg = '';
$user_name = $_SESSION['name'];
$email = $_SESSION['email'];
// File upload path
$targetDir = "Profile_images/";
$fileName = basename($_FILES["file"]["name"]);

// $saveName = $_SESSION["name"];
$targetFilePath = $targetDir . $fileName ;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        // 
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir.$user_name.".jpg")){
            
            // Insert image file name into database
            $insert = $conn->query("update userProfile set User_Profile_image='".$user_name.".jpg". "', Profile_image_upload_time=NOW() where User_Email_address='".$email."'");
            echo $targetFilePath."  ";
            if($insert){

                $statusMsg = "The file ". $fileName . " has been uploaded successfully.";
                header("Location: profileinformation.php");
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
echo $statusMsg;
?>