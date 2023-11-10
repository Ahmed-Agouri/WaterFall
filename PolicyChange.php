<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filename = 'policy.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $policyText = $_POST['policy-text'] ?? '';

    if (!file_exists($filename)) {
        echo "Error: file $filename does not exist";
    } else if (filesize($filename) === 0) {
        echo "Error: file $filename is empty";
    } else {
        $handle = fopen($filename, "w+");
        fwrite($handle, $policyText);
        fclose($handle);

        $message = '<script>alert("Successfully Updated Policy"); window.location.href = "userPolicytxt.php";</script>';
        echo $message;
    }
}
?>



