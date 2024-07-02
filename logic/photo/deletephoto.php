<?php
require_once(__DIR__ . "/../connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the photo URL to delete the file
    $sql = "SELECT photo_url FROM album_photos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($photo_url);
        $stmt->fetch();
        $stmt->close();

        // Delete the photo record from the database
        $sql = "DELETE FROM album_photos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                // Optionally delete the photo file from the filesystem
                $filePath = __DIR__ . "/../" . $photo_url;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                echo "Photo deleted successfully.";
                header("Location: ../../adminalbum.php");
                exit;
            } else {
                echo "Error executing SQL statement: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Failed to prepare the DELETE SQL statement: " . $conn->error;
        }
    } else {
        echo "Failed to prepare the SELECT SQL statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request. Please provide both 'id' and 'album_id' parameters.";
}
?>
