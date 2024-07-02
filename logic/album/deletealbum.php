<?php
require_once(__DIR__ . "/../connect.php");

if (isset($_GET['id'])) {
    $album_id = $_GET['id'];

    // Delete all photos related to the album
    $sql = "SELECT photo_url FROM album_photos WHERE album_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $album_id);
        $stmt->execute();
        $stmt->bind_result($photo_url);

        while ($stmt->fetch()) {
            $filePath = __DIR__ . "/../" . $photo_url;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $stmt->close();

        $sql = "DELETE FROM album_photos WHERE album_id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $album_id);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Failed to prepare the DELETE SQL statement for album_photos: " . $conn->error;
            exit;
        }
    } else {
        echo "Failed to prepare the SELECT SQL statement: " . $conn->error;
        exit;
    }

    // Delete the album record from the albums table
    $sql = "DELETE FROM albums WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $album_id);
        if ($stmt->execute()) {
            echo "Album deleted successfully.";
            header("Location: ../../adminalbum.php");
            exit;
        } else {
            echo "Error executing DELETE SQL statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Failed to prepare the DELETE SQL statement for albums: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request. Please provide the 'id' parameter.";
}
?>
