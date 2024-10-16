<?php
// Include your database connection file
include 'db_connection.php';

// Check if a file was uploaded
if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profileImage']['tmp_name'];
    $fileName = $_FILES['profileImage']['name'];
    $fileSize = $_FILES['profileImage']['size'];
    $fileType = $_FILES['profileImage']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Define allowed file types
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
    if (in_array($fileExtension, $allowedfileExtensions)) {
        // Create a unique name for the file
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Directory where profile pictures are stored
        $uploadFileDir = './uploaded_files/';
        $dest_path = $uploadFileDir . $newFileName;

        // Move the file to the upload directory
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Save file path to database
            session_start();
            $userId = $_SESSION['user_id']; // Assuming you are using session to track logged-in users

            $profileImagePath = $dest_path; // Store the file path
            $sql = "UPDATE users SET profile_picture = ? WHERE id = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $profileImagePath, $userId);

            if ($stmt->execute()) {
                echo "Profile picture updated successfully.";
                header("Location: profile.php"); // Redirect back to profile page
            } else {
                echo "Database error: Could not update profile picture.";
            }
        } else {
            echo 'There was some error moving the file to the upload directory. Please make sure the upload directory is writable by the web server.';
        }
    } else {
        echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
} else {
    echo 'No file uploaded or there was an upload error.';
}
?>
