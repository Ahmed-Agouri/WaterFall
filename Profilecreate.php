<?php


session_start();
include("config.php");


$UserName = $_POST['User_Name'];
$Bio = $_POST['Bio'];
$email = $_SESSION["email"];
error_reporting(E_ALL);
ini_set('display_errors' , 1);
// Update the user profile table with the bio
$sqlUpdateProfile = "UPDATE userProfile SET User_Bio='$Bio' , UserName='$UserName' WHERE User_Email_address='$email'";
if (mysqli_query($conn, $sqlUpdateProfile)) {
    
    // Get the user ID from the user_profile table
    $sqlGetUserID = "SELECT UserID FROM userProfile WHERE User_Email_address='$email'";
    $result = mysqli_query($conn, $sqlGetUserID);
    $row = mysqli_fetch_assoc($result);
    $userID = $row['UserID'];

    // Insert the user's information into the user_account table
    $sqlInsertUser = "INSERT INTO userAccount (UserID, User_Role) VALUES ('$userID', 'User')";
    if (mysqli_query($conn, $sqlInsertUser)) {
        header("Location: Home.php");
        exit;
    } else {
        echo "Error inserting user information: " . mysqli_error($conn);
    }
} else {
    echo "Error updating user profile: " . mysqli_error($conn);
}

?>

