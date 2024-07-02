<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "church";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM pastors";
$result = $conn->query($sql);

$pastors = [];
$conn->close();
?>
