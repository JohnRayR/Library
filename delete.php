<?php
require "db_connect.php";
$id = $_GET['id'];

$sql = "delete from members WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("location: /");
} else {
    echo "Error" . $sql . "<br>" . $conn->error;
}