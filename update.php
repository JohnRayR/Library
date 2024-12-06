<?php
require "db_connect.php";
$id = $_GET["id"];

$sql = "select * from list where id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$firstName = $row["firstName"];
$lastName = $row["lastName"];
$book =  $row["book"];
$date =  $row["date"];

$contact = $row["contact"];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Update Data</h1>
    <a href="index.php">View List</a>
    <form action="edit.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" value=<?= $id;?> hidden><br>
        First Name: <input type="text" name="firstName" value=<?= $firstName;?>><br>
        Last Name: <input type="text" name="lastName" value=<?= $lastName;?>><br>
        Book Title: <input type="text" name="book" value=<?= $lastName;?>><br>
        Date to Return: <input type="text" name="date" value=<?= $lastName;?>><br>
        Contact: <input type="text" name="contact"  value=<?= $contact;?>><br>
        Profile Picture: <input type="file" name="profilePicture"><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>