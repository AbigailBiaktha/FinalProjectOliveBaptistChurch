<?php
require_once(__DIR__ . "/../connect.php");

// Check if the connection is established


$sql = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT 3";
$result = $conn->query($sql);

// Debugging information
if (!$result) {
    die("Query failed: " . $conn->error);
}

$latest_blogs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $latest_blogs[] = $row;
    }
}

$conn->close();

function truncate($text, $length = 100, $ending = '...') {
    if (strlen($text) > $length) {
        $text = substr($text, 0, $length) . $ending;
    }
    return $text;
}
?>

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
            if (!empty($latest_blogs)) {
                foreach ($latest_blogs as $blog) {
                    $image_url = "blog_img/" . htmlspecialchars($blog['image']);
                    ?>
                    <div class="col-lg-4 mb-4 d-flex align-items-stretch">
                        <div class="card border-0 shadow-sm mb-2">
                            <img class="card-img-top mb-2" src="<?php echo $image_url; ?>" alt="Blog Image" />
                            <div class="card-body bg-light text-center p-4 d-flex flex-column">
                                <h4 class="mb-3"><?php echo htmlspecialchars($blog['title']); ?></h4>
                                <div class="d-flex justify-content-center mb-3">
                                    <small class="mr-3"><i class="fa fa-user text-primary"></i> <?php echo htmlspecialchars($blog['author']); ?></small>
                                </div>
                                <p class="flex-grow-1"><?php echo nl2br(htmlspecialchars_decode(strip_tags(truncate($blog['content'], 150), '<b><strong><i><em>'))); ?></p>
                                <a href="blog_post.php?id=<?php echo $blog['id']; ?>" class="btn btn-primary mt-auto">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='col-12 text-center'><p class='text-muted'>No blog posts found.</p></div>";
            }
            ?>
        </div>
    </div>
</div>
<!-- Blog End -->
