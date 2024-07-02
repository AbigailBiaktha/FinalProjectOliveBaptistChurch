<?php
require_once(__DIR__ . "/../connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cover_image = $_FILES['cover_image']['name'];
    $target_dir = __DIR__ . "/../../uploads/";

    // Create the uploads directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($cover_image);

    // Update the album record in the database
    if (!empty($cover_image)) {
        // If a new image is provided
        $check = getimagesize($_FILES['cover_image']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_file)) {
                $relative_target_file = "uploads/" . basename($cover_image);
                $sql = "UPDATE albums SET title = ?, description = ?, cover_image = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssi", $title, $description, $relative_target_file, $id);
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        } else {
            echo "File is not an image.";
            exit;
        }
    } else {
        // If no new image is provided
        $sql = "UPDATE albums SET title = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $description, $id);
    }

    if ($stmt->execute()) {
        echo "Album updated successfully.";
        header("Location: ../../adminalbum.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>