<?php
session_start(); // Start the session to store messages

$target_dir = "D:/wamp/www/IT2Y1_MADRID_JAMIERIVAN/WBDV_GRP7/uploaded_files/";
$target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);

// Ensure the directory exists
if (!is_dir($target_dir)) {
    $_SESSION['message'] = "Upload directory does not exist.";
    header("Location: profile.php");
    exit();
}

// Check if the file is successfully uploaded to the tmp folder
if (!is_uploaded_file($_FILES["profile_picture"]["tmp_name"])) {
    $_SESSION['message'] = "File was not uploaded correctly.";
    header("Location: profile.php");
    exit();
}

// Try moving the file to the target directory
if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
    $_SESSION['message'] = "Profile picture updated successfully.";
    header("Location: profile.php");
    exit();
} else {
    // Add detailed error information
    $error_info = "Possible reasons: ";
    $error_info .= (is_writable($target_dir)) ? "Directory is writable. " : "Directory is NOT writable. ";
    $error_info .= (file_exists($target_file)) ? "File already exists. " : "File does not exist.";
    
    $_SESSION['message'] = "Failed to upload the profile picture. " . $error_info;
    header("Location: profile.php");
    exit();
}
?>
