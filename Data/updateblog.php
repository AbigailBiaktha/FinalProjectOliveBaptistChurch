<?php 
include("logic/blog/getblog.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Blog</title>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        function showMessage(message) {
            document.getElementById('message').innerText = message;
        }
    </script>
</head>
<body>
    <div id="message"><?php if (isset($_SESSION['message'])) { echo htmlspecialchars($_SESSION['message']); unset($_SESSION['message']); } ?></div>
    
    <?php if (isset($row)): ?>
    <form method="post" enctype="multipart/form-data" action="logic/blog/updateblog.php">
        <input type="text" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" hidden>
        
        <table class="table">
            <tbody>
                <tr>
                    <td><label for="title">Title</label></td>
                    <td><input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="content">Content</label></td>
                    <td><textarea name="content" id="content" cols="30" rows="10"><?php echo htmlspecialchars($row['content']); ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="author">Author</label></td>
                    <td><input type="text" name="author" value="<?php echo htmlspecialchars($row['author']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="image">Image</label></td>
                    <td>
                        <input type="file" name="image">
                        <?php if (!empty($row['image'])) { ?>
                            <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Blog Image" class="blog-photo">
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="updateBtn" class="btn btn-primary">Submit</button>
                        <a href="adminblogview.php" class="btn btn-primary">Back</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <script>
        CKEDITOR.replace('content');
    </script>
    
    <?php else: ?>
        <p>No data available to update.</p>
    <?php endif; ?>
</body>
</html>