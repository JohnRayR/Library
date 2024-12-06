<?php
require "db_connect.php";
$id = $_POST['id'];
$firstName =  $_POST['firstName'];
$lastName =  $_POST['lastName'];
$book =  $_POST['book'];
$date =  $_POST['date'];
$contact =  $_POST['contact'];

$target_dir = "uploads/";
if (isset($_FILES["profilePicture"]) && $_FILES["profilePicture"]["error"] == 0) {
    $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
        $sql = "UPDATE list SET firstName = '$firstName', lastName = '$lastName', book = '$book', date ='$date',  contact = '$contact', profilePicture = '$target_file' WHERE id = $id";
    }
} else {
    $sql = "UPDATE list SET firstName = '$firstName', lastName = '$lastName', book = '$book', date = '$date' , contact ='$contact', profilePicture = '$target_file' WHERE id = $id";
}

if ($conn->query($sql) === TRUE) {
    header("location: /");
} else {
    echo "Error" . $sql . "<br>" . $conn->error;
}
