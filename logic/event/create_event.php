<?php

require_once(__DIR__ . "/../connect.php");

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $day = mysqli_real_escape_string($conn, $_POST['day']);
    $month = mysqli_real_escape_string($conn, $_POST['month']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Insert event into database
    $sqlInsert = "INSERT INTO events (day, month, year, title, time, description) 
                  VALUES ('$day', '$month', '$year', '$title', '$time', '$description')";
    
    if (mysqli_query($conn, $sqlInsert)) {
        // Redirect after successful insertion
        header("Location: ../../admin_view.php");
        exit();
    } else {
        echo "Error adding event: " . mysqli_error($conn);
    }
}

?>
