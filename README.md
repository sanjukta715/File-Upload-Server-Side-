# PHP File Upload System

## Features
- Upload profile pictures
- File validation (JPG/JPEG/PNG)
- Max file size: 2MB
- Stores file name in database
- Move uploaded file to "uploads/" directory
- Secure prepared statements

## How to Use
1. Create an "uploads" folder in the project.
2. Make sure it is writable (CHMOD 755).
3. Update DB credentials in db.php.
4. Open http://localhost/file-upload/upload_form.php
5. Upload an image.

## Database Requirement
users table must contain "profile_pic" column.
