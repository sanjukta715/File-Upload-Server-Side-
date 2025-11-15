<!DOCTYPE html>
<html>
<head>
    <title>Upload Profile Picture</title>
</head>
<body>

<h2>Upload Profile Picture</h2>

<form action="upload_handler.php" method="POST" enctype="multipart/form-data">
    <label>Select Image:</label><br>
    <input type="file" name="profile_pic" required><br><br>

    <label>User ID:</label><br>
    <input type="number" name="user_id" required><br><br>

    <button type="submit">Upload</button>
</form>

</body>
</html>
