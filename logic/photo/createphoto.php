<?php
require_once(__DIR__ . "/../connect.php");

if (isset($_POST['addPhotos'])) {
    $album_id = $_POST['album_id'];

    if (isset($_FILES['photo_url']) && !empty($_FILES['photo_url']['name'][0])) {
        foreach ($_FILES['photo_url']['tmp_name'] as $key => $tmp_name) {
            $fileName = $_FILES['photo_url']['name'][$key];
            $fileTmp = $_FILES['photo_url']['tmp_name'][$key];

            $timestamp = time();
            $newfileName = $timestamp . '_' . $fileName;
            $uploadPath = '../../uploads/album_photos/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $photo_url = $uploadPath . $newfileName;

            if (move_uploaded_file($fileTmp, $photo_url)) {
                $relative_target_file = "uploads/album_photos/" . $newfileName;
                $sql = "INSERT INTO album_photos (album_id, photo_url) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("is", $album_id, $relative_target_file);
                    if ($stmt->execute()) {
                        echo "File uploaded and record added: " . $fileName;
                    } else {
                        echo "Error executing SQL statement: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Failed to prepare the SQL statement: " . $conn->error;
                }
            } else {
                echo "Failed to upload file: " . $fileName;
            }
        }
    } else {
        echo "No files uploaded.";
    }

    header("Location: ../../updatealbum.php?id=" . $album_id);
    exit;
} else {
    echo "Invalid request.";
}
?>
