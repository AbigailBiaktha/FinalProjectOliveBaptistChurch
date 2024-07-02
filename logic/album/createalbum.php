<?php
require_once(__DIR__ . "/../connect.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cover_image = $_FILES['cover_image']['name'];
    $target_dir = __DIR__ . "/../../uploads/";

    // Create the uploads directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($cover_image);

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES['cover_image']['tmp_name']);
    if ($check !== false) {
        if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_file)) {
            $relative_target_file = "uploads/" . basename($cover_image); // Store the relative path in the database
            $sql = "INSERT INTO albums (title, description, cover_image) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $title, $description, $relative_target_file);

            if ($stmt->execute()) {
                echo "Album created successfully.";
                header("Location: ./adminalbum.php");
                exit;
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
    $conn->close();
}
?>

