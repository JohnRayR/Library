<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    echo "Connection Error";
}

?>