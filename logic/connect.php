<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "church";

$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    echo "connection fail.." . mysqli_connect_error();
}
