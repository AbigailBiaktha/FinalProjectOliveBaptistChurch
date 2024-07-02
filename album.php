<?php include 'layout/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album - Olive Baptist Church</title>
    <link rel="stylesheet" href="css/album.css">
</head>
<body>


    <main>
        <h1>Photo Album</h1>
        <section class="album-container">
            <?php
            // Initialize albums array
            $albums = [];

            // Fetch albums from the database
            require 'logic/album/getalbum.php';

            // Check if albums data is available
            if (!empty($albums)) {
                foreach ($albums as $album) {
                    echo '<div class="album-card">';
                    echo '<img src="' . $album['cover_image'] . '" alt="' . $album['title'] . ' cover">';
                    echo '<div class="album-details">';
                    echo '<h2>' . $album['title'] . '</h2>';
                    echo '<p>' . $album['description'] . '</p>';
                    echo '<a href="view_album.php?album_id=' . $album['id'] . '" class="view-album-button">View Album</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No albums available at the moment. Please check back later.</p>';
            }
            ?>
        </section>
    </main>

    <?php include 'layout/footer.php'; ?>
</body>
</html>
