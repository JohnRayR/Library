<?php
require "db_connect.php";
$firstName =  $_POST['firstName'];
$lastName =  $_POST['lastName'];
$book =  $_POST['book'];
$date =  $_POST['date'];

$contact =  $_POST['contact'];

// kunin yung directpry and filename
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}


// Check file size
if ($_FILES["profilePicture"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["profilePicture"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$sql = "INSERT INTO list (firstName, lastName, book, date, contact, profilePicture)
        VALUES ('$firstName', '$lastName', '$book', '$date','$contact', '$target_file')";
        
if($conn->query($sql) === TRUE){
    header("location: /");
}else{
    echo "Error" . $sql . "<br>" . $conn->error;
}

?>