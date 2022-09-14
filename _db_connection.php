<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "_db_tboyz";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    echo "fail";
}
?>