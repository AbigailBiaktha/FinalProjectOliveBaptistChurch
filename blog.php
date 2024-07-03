<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Olive Baptist Church</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .card-body p {
            text-align: justify;
        }
        .card-body h4 {
            font-weight: bold;
        }
        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-body {
            flex-grow: 1;
        }
        .row-eq-height {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <?php require_once 'layout/header.php'; ?>
   

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Latest Blog</span>
                </p>
                <h1 class="mb-4">Latest Articles From Blog</h1>
            </div>
            <div class="row row-eq-height pb-3">
                <?php
                include_once("logic/blog/readblog.php");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $image_url = "blog_img/" . $row['image'];
                        ?>
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow-sm mb-2">
                                <img class="card-img-top mb-2" src="<?php echo htmlspecialchars($image_url); ?>" alt="Blog Image" />
                                <div class="card-body bg-light text-center p-4">
                                    <h4><?php echo mb_strimwidth(htmlspecialchars($row['title']), 0, 50, "..."); ?></h4>
                                    <div class="d-flex justify-content-center mb-3">
                                        <small class="mr-3">
                                            <i class="fa fa-user text-primary"></i> <?php echo htmlspecialchars($row['author']); ?>
                                        </small>
                                    </div>
                                    <p><?php echo mb_strimwidth(htmlspecialchars_decode(str_replace("\\r\\n", "\r\n", $row['content'])), 0, 110, "..."); ?></p>
                                    <a href="blog_post.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<div class='col-12 text-center'><p class='text-muted'>No blog posts found.</p></div>";
                }
                $conn->close();
                ?>
            </div>
             <!-- Back to Top -->
            <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <?php require_once 'layout/footer.php'; ?>
    <!-- Blog End -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
