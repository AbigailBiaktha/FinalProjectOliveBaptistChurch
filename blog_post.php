<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post | Olive Baptist Church</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .comment-section {
            margin-top: 30px;
        }
        .comment-form {
            margin-bottom: 30px;
        }
        .comment {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }
        .comment h5 {
            margin: 0;
            font-size: 18px;
            color: #007bff;
        }
        .comment p {
            margin: 5px 0;
        }
        .comment .text-muted {
            font-size: 0.9em;
        }

        body {
            font-family: 'Nunito', sans-serif;
        }
        .comment {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        
        .content, .lead, .display-4, .comment p {
            color: black;
            text-align: justify;
        }
        p {
            margin-top: 0;
            margin-bottom: 0.5em;
        }
    </style>
</head>
<body>

<?php include_once("layout/navblog.php"); ?>
<?php include_once("logic/blog/getblog.php"); ?>

<!-- Blog Post Start -->
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <a href="blog.php" class="btn btn-secondary mb-4"><i class="fas fa-arrow-left"></i> Back to Blog</a>
            <?php if (isset($row)) { ?>
                <div class="blog-post shadow-lg p-5 bg-white rounded">
                    <img src="blog_img/<?php echo htmlspecialchars($row['image']); ?>" class="img-fluid rounded mb-4" alt="<?php echo htmlspecialchars($row['title']); ?>">
                    <h1 class="display-4"><?php echo htmlspecialchars($row['title']); ?></h1>
                    <p class="lead text-muted">
                        <?php echo date("F j, Y", strtotime($row['created_at'])); ?> by <strong><?php echo htmlspecialchars($row['author']); ?></strong>
                    </p>
                    <div class="content">
                        <p class="lead"><?php echo nl2br(htmlspecialchars_decode($row['content'])); ?></p>
                    </div>
                </div>

                <!-- Comment Section Start -->
                <div class="container comment-section">
                    <div class="row">
                        <div class="col-12">
                            <h3>Comments</h3>
                            <!-- Comment Form -->
                            <form action="logic/blog/addcomment.php" method="post" class="comment-form mb-4">
                                <input type="hidden" name="blog_id" value="<?php echo $row['id']; ?>">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Comment</button>
                            </form>

                            <!-- Display Comments -->
                            <?php include_once("logic/blog/get_comment.php"); ?>
                            <?php if (isset($comments_result) && $comments_result->num_rows > 0) {
                                while ($comment_row = $comments_result->fetch_assoc()) { ?>
                                    <div class="comment">
                                        <h5><?php echo htmlspecialchars($comment_row['name']); ?></h5>
                                        <p><?php echo nl2br(htmlspecialchars($comment_row['comment'])); ?></p>
                                        <p class="text-muted"><?php echo date("F j, Y, g:i a", strtotime($comment_row['created_at'])); ?></p>
                                    </div>
                                <?php }
                            } else { echo "<p>No comments yet. Be the first to comment!</p>"; } ?>
                        </div>
                    </div>
                </div>
                <!-- Comment Section End -->
            <?php } else {
                echo "<div class='alert alert-warning text-center' role='alert'>Blog post not found.</div>";
            } ?>
<!-- Back to Top -->
  <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
</div>
<!-- Blog Post End -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrap.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
