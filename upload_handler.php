<?php
require "db.php";

$user_id = $_POST['user_id'];

if (!isset($_FILES['profile_pic'])) {
    die("No file uploaded.");
}

$file = $_FILES['profile_pic'];

$filename = $file['name'];
$tmp_path = $file['tmp_name'];
$size = $file['size'];
$error = $file['error'];

// Validate upload
if ($error !== 0) {
    die("Upload error: $error");
}

// Allowed types
$allowed_ext = ["jpg", "jpeg", "png"];
$file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

if (!in_array($file_ext, $allowed_ext)) {
    die("Invalid file type. Only JPG, JPEG, PNG allowed.");
}

// Size limit (2 MB)
if ($size > 2 * 1024 * 1024) {
    die("File too large. Max 2MB.");
}

// Give file a unique name
$new_name = uniqid("IMG_", true) . "." . $file_ext;

// Set upload destination
$destination = "uploads/" . $new_name;

// Move file to uploads folder
if (!move_uploaded_file($tmp_path, $destination)) {
    die("Failed to upload file.");
}

// Save file path in database
$stmt = $conn->prepare("UPDATE users SET profile_pic = ? WHERE id = ?");
$stmt->bind_param("si", $new_name, $user_id);

if ($stmt->execute()) {
    echo "<h3>File uploaded successfully!</h3>";
    echo "<img src='uploads/$new_name' width='200'><br><br>";
    echo "<a href='upload_form.php'>Upload another</a>";
} else {
    echo "Database update failed: " . $stmt->error;
}
?>
