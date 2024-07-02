<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "church";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Debugging: Check if ID is received
if (isset($_GET['id'])) {
    $pastor_id = $_GET['id'];
    echo "Pastor ID: " . htmlspecialchars($pastor_id) . "<br>";

    $query = "SELECT * FROM pastors WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $pastor_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Debugging: Check if query executed and results are returned
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Pastor Name: " . htmlspecialchars($row['name']) . "<br>"; // Debugging
        } else {
            echo "No pastor found with the provided ID.";
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "No pastor ID provided.";
}

$conn->close();
?>
