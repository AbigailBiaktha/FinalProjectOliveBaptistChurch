<?php
// Backend logic to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("logic/connect.php");
    header('Content-Type: application/json');

    $response = array();

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert the message into the database
    $insertQuery = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $insertQuery)) {
        // Message inserted successfully
        $response['status'] = 'success';
        $response['message'] = 'Message sent successfully.';
    } else {
        // Error occurred while inserting the message
        $response['status'] = 'error';
        $response['message'] = 'Error sending message. Please try again later.';
    }

    echo json_encode($response);
    mysqli_close($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="lib/lightbox/css/lightbox.min.css">
    <link rel="stylesheet" href="css/contact.css">
    
</head>
<body>
    <?php require_once 'layout/header.php'; ?>
    <?php require_once 'layout/navbar.php'; ?>

    
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title">
                    <span>Get In Touch</span>
                </p>
                <h3 class="mb-4">Contact Us For Any Query</h3>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="contact-form">
                        <div id="responseMessage" class="alert"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST" action="">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="4" id="message" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                              <button class="btn btn-primary py-2 px-4 btn-centered" type="submit" id="sendMessageButton" style="background-color: #0f6674; border-color: #0f6674;">
                                Send Message
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php require_once(__DIR__ . "/layout/footer.php"); ?>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            fetch('contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                var responseMessage = document.getElementById('responseMessage');
                if (data.status === 'success') {
                    responseMessage.classList.remove('alert-danger');
                    responseMessage.classList.add('alert-success');
                    responseMessage.innerText = data.message;
                } else {
                    responseMessage.classList.remove('alert-success');
                    responseMessage.classList.add('alert-danger');
                    responseMessage.innerText = data.message;
                }
                responseMessage.style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
                var responseMessage = document.getElementById('responseMessage');
                responseMessage.classList.remove('alert-success');
                responseMessage.classList.add('alert-danger');
                responseMessage.innerText = 'Failed to send message. Please try again.';
                responseMessage.style.display = 'block';
            });
        });
    </script>

</body>
</html>
