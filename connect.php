<!-- used to create a connection to DB -->

<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = "login";
$conn = new mysqli($host, $user, $pass, $db);  // creating an object to establish a DB connection

if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}
?>