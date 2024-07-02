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