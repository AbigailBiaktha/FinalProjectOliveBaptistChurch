<?php
require_once(__DIR__ . "/../connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $biography = $_POST['biography'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    $photo = $_FILES['photo']['name'];
    $target_dir = __DIR__ . "/../../uploads/pastor/";

    // Create the uploads/pastor directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($photo);

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES['photo']['tmp_name']);
    if ($check !== false) {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $photo_url = "uploads/pastor/" . basename($photo); // Store the relative path in the database
            $sql = "INSERT INTO pastors (name, title, biography, photo_url, email, phone, facebook_url, twitter_url, instagram_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssss", $name, $title, $biography, $photo_url, $email, $phone, $facebook, $twitter, $instagram);

            if ($stmt->execute()) {
                echo "New pastor profile created successfully.";
                header("Location: ./adminpastor.php");
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
