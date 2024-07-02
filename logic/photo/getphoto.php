<?php
// Database connection
require_once(__DIR__ . "/../connect.php");

$album_id = isset($_GET['album_id']) ? (int)$_GET['album_id'] : 0;

$album = null;

if ($album_id > 0) {
    // Fetch album details
    $album_query = "SELECT * FROM albums WHERE id = $album_id";
    $album_result = mysqli_query($conn, $album_query);

    if ($album_result && mysqli_num_rows($album_result) > 0) {
        $album = mysqli_fetch_assoc($album_result);
        
        // Fetch album photos
        $photos_query = "SELECT * FROM album_photos WHERE album_id = $album_id";
        $photos_result = mysqli_query($conn, $photos_query);

        $album['photos'] = [];
        while ($photo = mysqli_fetch_assoc($photos_result)) {
            $album['photos'][] = $photo['photo_url'];
        }
    }
}
?>
