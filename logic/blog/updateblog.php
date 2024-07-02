<?php
session_start();

require_once(__DIR__ . "/../connect.php");

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateBtn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $author = $conn->real_escape_string($_POST['author']);

    // Initialize image variable with existing image URL
    $image = $row['image'];

    // Handle file upload if a new photo is uploaded
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            $_SESSION['message'] = 'Sorry, file already exists.';
            $uploadOk = 0;
        }

        // Check file size (example: limit to 5MB)
        if ($_FILES["image"]["size"] > 5000000) {
            $_SESSION['message'] = 'Sorry, your file is too large.';
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowed_file_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_file_types)) {
            $_SESSION['message'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['message'] = 'Sorry, your file was not uploaded.';
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = basename($_FILES["image"]["name"]);
            } else {
                $_SESSION['message'] = 'Sorry, there was an error uploading your file.';
            }
        }
    }

    // Prepare update query
    $sql = "UPDATE blogs SET title = ?, content = ?, author = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssi", $title, $content, $author, $image, $id);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Blog post updated successfully.";
            $stmt->close();
            $conn->close();
            header("Location: ../../adminblogview.php?id=" . urlencode($id));
            exit;
        } else {
            $_SESSION['message'] = "Error updating blog post: " . $stmt->error;
        }
    } else {
        $_SESSION['message'] = "Error preparing statement: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

// Fetch blog data after potential update to display in the form
include("logic/blog/getblog.php");
?>

