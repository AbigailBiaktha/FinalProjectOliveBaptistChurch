<?php
session_start();


if (isset($_GET['id'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "church";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $conn->real_escape_string($_GET['id']);

    // Check if image_url column exists
    $result = $conn->query("SHOW COLUMNS FROM blogs LIKE 'image_url'");
    $image_url_column_exists = $result && $result->num_rows > 0;

    if ($image_url_column_exists) {
        // Fetch the image URL to delete the file
        $sql = "SELECT image_url FROM blogs WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $image_url = $row['image_url'];
            if (file_exists($image_url)) {
                unlink($image_url); // Delete the image file
            }
        }
    }

    // Delete the blog post
    $sql = "DELETE FROM blogs WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location:../../adminblogview.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
