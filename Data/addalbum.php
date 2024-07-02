<?php
include("logic/album/createalbum.php");
?>

<body>

    <form method="post" enctype="multipart/form-data" class="mt-5">
        <div class="mb-3">
            <label for="album_name" class="form-label">Name of Album</label>
            <input type="text" name="album_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" name="addBtn" class="btn btn-primary" style="background-color: #2F4F4Fff;">Submit</button>
            <a href="adminalbumview.php" class="btn btn-primary" style="background-color: #2F4F4Fff;">Back</a>
        </div>
    </form>

    <div class="mt-5">
        <table class="table table-bordered">
            <?php include("logic/album/readalbum.php") ?>
        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
