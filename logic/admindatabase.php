<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "church";

$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    echo "connection fail.." . mysqli_connect_error();
}


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hash the password
$adminPassword = password_hash('olive24@', PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (email, name, password) VALUES ('olivebaptistchurchadmin@org.com', 'admin', '$adminPassword')";

if ($conn->query($sql) === TRUE) {
    echo "New admin created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
