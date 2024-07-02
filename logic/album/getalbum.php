<?php
require_once(__DIR__ . "/../connect.php");


// Fetch albums and their photos
$query = "SELECT * FROM albums";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$albums = [];
while ($album = mysqli_fetch_assoc($result)) {
    $album_id = $album['id'];
    $album['photos'] = [];
    
    $photo_query = "SELECT * FROM album_photos WHERE album_id = $album_id";
    $photo_result = mysqli_query($conn, $photo_query);
    
    // Check if the photo query was successful
    if (!$photo_result) {
        die("Photo query failed: " . mysqli_error($conn));
    }
    
    while ($photo = mysqli_fetch_assoc($photo_result)) {
        $album['photos'][] = $photo['photo_url'];
    }
    
    $albums[] = $album;
}
?>