<body>

    <?php include("logic/photo/getphoto.php") ?>

    <h1><?php echo htmlspecialchars($photo['title']); ?></h1>
    <img src='<?php echo htmlspecialchars($photo['photo_url']); ?>' width='100'>

</body>

</html>
