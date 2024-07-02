<!DOCTYPE html>
<html>
<head>
    <title>Update Pastor</title>
    <script>
        function showMessage(message) {
            document.getElementById('message').innerText = message;
        }
         // Function to redirect after form submission
         function redirectToAdminPastorPage() {
            window.location.href = './adminpastor.php';
        }
    </script>
    <style>
        .pastor-photo {
            max-width: 100px;
            max-height: 100px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div id="message">
        <?php
        if (isset($_SESSION['message'])) {
            echo htmlspecialchars($_SESSION['message']);
            unset($_SESSION['message']);
        }
        ?>
    </div>
    <?php
    include("logic/pastor/getpastor.php");


    // Check if $row is set and has data
    if (isset($row)) {
    ?>

    <form method="post" enctype="multipart/form-data" action="logic/pastor/updatepastor.php">
        <input type="text" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" hidden>

        <table class="table">
            <tbody>
                <tr>
                    <td><label for="name">Name</label></td>
                    <td><input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="title">Title</label></td>
                    <td><input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="biography">Biography</label></td>
                    <td><textarea name="biography" cols="30" rows="10"><?php echo htmlspecialchars($row['biography']); ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="phone">Phone</label></td>
                    <td><input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="facebook">Facebook</label></td>
                    <td><input type="text" name="facebook" value="<?php echo htmlspecialchars($row['facebook_url']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="twitter">Twitter</label></td>
                    <td><input type="text" name="twitter" value="<?php echo htmlspecialchars($row['twitter_url']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="instagram">Instagram</label></td>
                    <td><input type="text" name="instagram" value="<?php echo htmlspecialchars($row['instagram_url']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="photo">Photo</label></td>
                    <td>
                        <input type="file" name="photo">
                        <?php if (!empty($row['photo_url'])) { ?>
                            <img src="uploads/<?php echo htmlspecialchars($row['photo_url']); ?>" alt="Pastor Photo" class="pastor-photo">
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="updateBtn" class="btn btn-primary">Submit</button>
                        <a href="./adminpastor.php" class="btn btn-primary">Back</a>
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
