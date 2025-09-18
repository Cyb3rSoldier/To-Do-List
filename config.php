<?php

//this php fie is for database connection!

$host = "localhost";
$user = "root";
$password = "";
$database = "to-do-list";

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

?>