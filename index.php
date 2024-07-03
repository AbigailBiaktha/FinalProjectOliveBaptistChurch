<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Olive Baptist Church</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/welcome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

</head>
<body>

  <?php require_once 'layout/header.php'; ?>




  <!-- Ministries Section Start -->
  <div class="container-fluid pt-5">
    <div class="container pb-3">
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="ministry-card">
            <div class="icon-box">
              <i class="fas fa-praying-hands text-primary"></i>
            </div>
            <div class="ministry-content">
              <h4>Prayer Meetings</h4>
              <p>Join our regular sessions to pray for our community and the world.</p>
              <small><strong>Every Wednesday at 7 PM</strong></small>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="ministry-card">
            <div class="icon-box">
              <i class="fas fa-bible text-primary"></i>
            </div>
            <div class="ministry-content">
              <h4>Bible Study</h4>
              <p>Explore the scriptures and deepen your faith through our engaging study sessions.</p>
              <small><strong>Tuesdays and Thursdays at 6 PM</strong></small>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="ministry-card">
            <div class="icon-box">
              <i class="fas fa-church text-primary"></i>
            </div>
            <div class="ministry-content">
              <h4>Sunday Services</h4>
              <p>Experience inspiring sermons and heartfelt worship every Sunday.</p>
              <small><strong>Every Sunday at 10 AM</strong></small>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="ministry-card">
            <div class="icon-box">
              <i class="fas fa-users text-primary"></i>
            </div>
            <div class="ministry-content">
              <h4>Youth Fellowship</h4>
              <p>Engage in activities and discussions that foster spiritual growth and friendship.</p>
              <small><strong>Fridays at 5 PM</strong></small>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="ministry-card">
            <div class="icon-box">
              <i class="fas fa-hands-helping text-primary"></i>
            </div>
            <div class="ministry-content">
              <h4>Community Service</h4>
              <p>Make a difference by joining our community service initiatives.</p>
              <small><strong>First Saturday of each month at 9 AM</strong></small>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="ministry-card">
            <div class="icon-box">
              <i class="fas fa-music text-primary"></i>
            </div>
            <div class="ministry-content">
              <h4>Choir Practice</h4>
              <p>Lift your voice in praise and be a part of our joyous choir.</p>
              <small><strong>Thursdays at 7 PM</strong></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Ministries Section End -->


  <!-- About Section Start -->
  <div class="container-fluid about-section py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="image-hover">
            <img class="img-fluid rounded" src="img/church.png" alt="Olive Baptist Church Entrance">
            <div class="middle">
              <div class="text">Welcome to Olive Baptist</div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="about-text">
            <h2 class="section-heading fade-in-up">Learn More About Us</h2>
            <h1 class="mb-4 fade-in-up">A Spiritual Home For Everyone</h1>
            <p class="fade-in-up">At Olive Baptist Church, we embrace all who come seeking God's love. Our community is dedicated to spreading the teachings of Jesus Christ and fostering a supportive environment where every individual can grow spiritually. Join us to experience divine worship, community service, and fellowship.</p>
            <a href="about.php" class="btn btn-custom mt-4 py-2 px-4 fade-in-up">Visit Us</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About Section End -->

  <!-- Ministry Groups Section Start -->
<div class="container-fluid pt-5 bg-light">
  <div class="container">
    <div class="text-center pb-4">
      <h1 class="mb-5">Get Involved and Make a Difference</h1>
    </div>
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow h-100">
          <img class="card-img-top" src="img/women.png" alt="Women's Ministry">
          <div class="card-body">
            <h4 class="card-title">Women's Ministry</h4>
            <p class="card-text">Join a vibrant community of women dedicated to supporting each other and growing in faith together.</p>
          </div>
          <div class="card-footer bg-transparent">
            <a href="women.php" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow h-100">
          <img class="card-img-top" src="img/men.png" alt="Men's Ministry">
          <div class="card-body">
            <h4 class="card-title">Men's Ministry</h4>
            <p class="card-text">Empower and connect with other men in our church through events, retreats, and mentorship programs.</p>
          </div>
          <div class="card-footer bg-transparent">
            <a href="men.php" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow h-100">
          <img class="card-img-top" src="img/young.png" alt="Youth Ministry">
          <div class="card-body">
            <h4 class="card-title">Youth Ministry</h4>
            <p class="card-text">Dynamic and engaging, our Youth Ministry offers a range of activities to help young people connect and grow.</p>
          </div>
          <div class="card-footer bg-transparent">
            <a href="youth.php" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Ministry Groups Section End -->


  <div class="container-fluid visit-us">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 mb-5 mb-lg-0">
          <h1 class="mb-4">Experience Our Community</h1>
          <p>Discover the warmth and community spirit of our church. Each service and event offers a chance to grow, connect, and find peace. No need to book—just come as you are.</p>
          <ul class="list-unstyled">
            <li class="py-2"><i class="fa fa-clock text-primary mr-3"></i>Services every Sunday at 10 AM</li>
            <li class="py-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Hakha, Chin State, Myanmar</li>
            <li class="py-2"><i class="fa fa-phone text-primary mr-3"></i>Call us at (+95)123456789 for more info</li>
          </ul>
        </div>
        <div class="col-lg-5">
          <img src="img/church-interior.png" alt="Church Interior" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </div>
  <!-- Visit Us End -->

  <!-- Upcoming Events Start -->
  <div class="container-fluid upcoming-events py-5">
        <div class="container text-center">
            <h1 class="mb-5">Upcoming Events</h1>
            <div class="row">
                <?php include 'logic/event/get_events.php'; ?>
            </div>
        </div>
    </div>
    <!-- Upcoming Events End -->
 
  <!-- Bible Verses Start -->
  <div class="container-fluid py-5">
    <div class="container">
      <div class="text-center pb-4">
        <h1 class="mb-4" style="color: #1B3A57;">Words of Inspiration</h1>
      </div>
      <div class="owl-carousel testimonial-carousel">
        <div class="testimonial-item px-3">
          <div class="bg-primary shadow-sm rounded mb-4 p-4 d-flex align-items-center" style="height: 250px;">
            <div class="text-white w-100">
              <h3 class="fas fa-quote-left text-white mr-3"></h3>
              <p class="m-0">
                "For I know the plans I have for you," declares the Lord, "plans to prosper you and not to harm you, plans to give you hope and a future." - Jeremiah 29:11
              </p>
            </div>
          </div>
        </div>
        <div class="testimonial-item px-3">
          <div class="bg-secondary shadow-sm rounded mb-4 p-4 d-flex align-items-center" style="height: 250px;">
            <div class="text-white w-100">
              <h3 class="fas fa-quote-left text-white mr-3"></h3>
              <p class="m-0">
                "The Lord is my shepherd; I shall not want." - Psalm 23:1
              </p>
            </div>
          </div>
        </div>
        <div class="testimonial-item px-3">
          <div class="bg-success shadow-sm rounded mb-4 p-4 d-flex align-items-center" style="height: 250px;">
            <div class="text-white w-100">
              <h3 class="fas fa-quote-left text-white mr-3"></h3>
              <p class="m-0">
                "I can do all things through Christ who strengthens me." - Philippians 4:13
              </p>
            </div>
          </div>
        </div>
        <div class="testimonial-item px-3">
          <div class="bg-danger shadow-sm rounded mb-4 p-4 d-flex align-items-center" style="height: 250px;">
            <div class="text-white w-100">
              <h3 class="fas fa-quote-left text-white mr-3"></h3>
              <p class="m-0">
                "Be strong and courageous. Do not be afraid; do not be discouraged, for the Lord your God will be with you wherever you go." - Joshua 1:9
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bible Verses End -->

  <?php
// Include the database connection
require 'logic/connect.php';

// Define the truncate function
function truncate($text, $length) {
    if (strlen($text) <= $length) {
        return $text;
    }
    $truncated = substr($text, 0, $length) . '...';
    return $truncated;
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
            $query = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT 3";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($blog = $result->fetch_assoc()) {
                    $image_url = "blog_img/" . $blog['image'];
                    ?>
                    <div class="col-lg-4 mb-4 d-flex align-items-stretch">
                        <div class="card border-0 shadow-sm mb-2">
                            <img class="card-img-top mb-2" src="<?php echo htmlspecialchars($image_url); ?>" alt="Blog Image" />
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

            $conn->close();
            ?>
        </div>
    </div>
</div>
<!-- Blog End -->



  <?php require_once 'layout/footer.php'; ?>

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>



  <script>
        document.addEventListener('DOMContentLoaded', function() {
            const welcomeHeader = "Welcome to Olive Baptist Church";
            const welcomeSubheader = "\"For where two or three gather in my name, there am I with them.\" - Matthew 18:20";
            let headerIndex = 0;
            let subheaderIndex = 0;

            function typeHeader() {
                if (headerIndex < welcomeHeader.length) {
                    document.getElementById('welcome-header').innerHTML += welcomeHeader.charAt(headerIndex);
                    headerIndex++;
                    setTimeout(typeHeader, 100); // Adjust typing speed here
                } else {
                    setTimeout(typeSubheader, 500); // Pause before starting the subheader
                }
            }

            function typeSubheader() {
                if (subheaderIndex < welcomeSubheader.length) {
                    document.getElementById('welcome-subheader').innerHTML += welcomeSubheader.charAt(subheaderIndex);
                    subheaderIndex++;
                    setTimeout(typeSubheader, 100); // Adjust typing speed here
                }
            }

            typeHeader();
        });

</body>
</html>
