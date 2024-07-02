<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Pastors | Olive Baptist Church</title>
    <link rel="stylesheet" href="css/pastor.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php require_once 'layout/header.php'; ?>
<?php include_once("logic/pastor/readpastor.php"); ?>

<!-- Pastor Profiles Start -->
<div class="container-service">
    <div class="container">
         
    <p class="text-center section-subtitle mb-5">Meet the dedicated leaders of our church community</p>

        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $photo_url = str_replace("..", ".", $row['photo_url']);
                    ?>
                    <div class="col-12 mb-4">
                        <div class="pastor-card shadow-lg">
                            <img src="<?php echo $photo_url; ?>" alt="Pastor <?php echo htmlspecialchars($row['name']); ?>">
                            <div class="pastor-card-body">
                                <h5 class="pastor-card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                                <p class="pastor-card-text"><?php echo htmlspecialchars($row['biography']); ?></p>
                                <div class="pastor-contact">
                                    <?php if (!empty($row['email'])) { ?>
                                        <p>Email: <a href="mailto:<?php echo htmlspecialchars($row['email']); ?>"><?php echo htmlspecialchars($row['email']); ?></a></p>
                                    <?php } ?>
                                    <?php if (!empty($row['phone'])) { ?>
                                        <p>Phone: <a href="tel:<?php echo htmlspecialchars($row['phone']); ?>"><?php echo htmlspecialchars($row['phone']); ?></a></p>
                                    <?php } ?>
                                </div>
                                <div class="social-media mt-3">
                                    <?php if (!empty($row["facebook_url"])) { ?>
                                        <a href="<?php echo htmlspecialchars($row["facebook_url"]); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <?php } ?>
                                    <?php if (!empty($row["twitter_url"])) { ?>
                                        <a href="<?php echo htmlspecialchars($row["twitter_url"]); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <?php } ?>
                                    <?php if (!empty($row["instagram_url"])) { ?>
                                        <a href="<?php echo htmlspecialchars($row["instagram_url"]); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='col-12 text-center'><p class='text-muted'>No pastors found.</p></div>";
            }
            ?>
        </div>
    </div>
</div>
 <!-- Back to Top -->
 <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>
<!-- Pastor Profiles End -->

<?php require_once(__DIR__ . "/layout/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
