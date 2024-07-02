<?php

require_once(__DIR__ . "/../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateBtn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $title = $conn->real_escape_string($_POST['title']);
    $biography = $conn->real_escape_string($_POST['biography']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $facebook = $conn->real_escape_string($_POST['facebook']);
    $twitter = $conn->real_escape_string($_POST['twitter']);
    $instagram = $conn->real_escape_string($_POST['instagram']);

    // Handle file upload if a new photo is uploaded
    $photo_url = "";
    if (!empty($_FILES["photo"]["name"])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo 'Sorry, file already exists.';
            $uploadOk = 0;
        }

        // Check file size (example: limit to 5MB)
        if ($_FILES["photo"]["size"] > 5000000) {
            echo 'Sorry, your file is too large.';
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowed_file_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_file_types)) {
            echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo 'Sorry, your file was not uploaded.';
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                $photo_url = basename($_FILES["photo"]["name"]);
            } else {
                echo 'Sorry, there was an error uploading your file.';
            }
        }
    }

    if ($photo_url != "") {
        $sql = "UPDATE pastors SET name='$name', title='$title', biography='$biography', photo_url='$photo_url', email='$email', phone='$phone', facebook_url='$facebook', twitter_url='$twitter', instagram_url='$instagram' WHERE id='$id'";
    } else {
        $sql = "UPDATE pastors SET name='$name', title='$title', biography='$biography', email='$email', phone='$phone', facebook_url='$facebook', twitter_url='$twitter', instagram_url='$instagram' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: ../../adminpastor.php?id=" . urlencode($row['id']));

        exit;
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }

    $conn->close();
}
?>