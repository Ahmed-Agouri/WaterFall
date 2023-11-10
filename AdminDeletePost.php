<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postId = $_POST["Post_ID"];

    $sql = "DELETE FROM Media_Information WHERE Post_ID = $postId";
    if ($conn->query($sql) === TRUE) {
        $message = '<script>alert("Post Deleted");history.go(-1);</script>';
        echo $message;  
     
    } else {
      echo "Error deleting post: " . $conn->error;
    }
}
?>