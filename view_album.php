<?php include 'layout/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Details - Olive Baptist Church</title>
    <link rel="stylesheet" href="css/view_album.css">
</head>
<body>
    <main>
    <a href="album.php" class="btn btn-secondary mb-4"><i class="fas fa-arrow-left"></i> Back to Album</a>
        <?php
        // Fetch album details and photos from the database
        require 'logic/photo/getphoto.php';

        if (isset($album) && $album) {
            echo '<h1>' . $album['title'] . '</h1>';
            echo '<p>' . $album['description'] . '</p>';
            echo '<section class="photo-gallery">';
            foreach ($album['photos'] as $photo_url) {
                echo '<div class="photo">';
                echo '<img src="' . $photo_url . '" alt="Photo">';
                echo '</div>';
            }
            echo '</section>';
        } else {
            echo '<p>Album not found.</p>';
        }
        ?>
    </main>

    <?php include 'layout/footer.php'; ?>
</body>
</html>
