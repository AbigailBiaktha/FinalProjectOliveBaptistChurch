<!DOCTYPE html>
<html>
<head>
    <title>Update Album</title>
    <script>
        function showMessage(message) {
            document.getElementById('message').innerText = message;
        }
    </script>
</head>
<body>
    <div id="message"></div>
    <?php
    include("logic/album/getalbum.php");
    include("logic/album/updatealbum.php");

    // Check if $row is set and has data
    if (isset($row)) {
    ?>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" hidden>

        <table class="table">
            <tbody>
                <tr>
                    <td><label for="title">Title</label></td>
                    <td><input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="description">Description</label></td>
                    <td><textarea name="description" id="description" cols="30" rows="10" required><?php echo htmlspecialchars($row['description']); ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="cover_image">Cover Image</label></td>
                    <td>
                        <input type="file" name="cover_image">
                        <?php if (!empty($row['cover_image'])): ?>
                            <p>Current image: <img src="<?php echo htmlspecialchars($row['cover_image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" width="100"></p>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="updateBtn" class="btn btn-primary">Submit</button>
                        <a href="adminalbum.php" class="btn btn-primary">Back</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <?php
    } else {
        echo "No data available to update.";
    }
    ?>
</body>
</html>
