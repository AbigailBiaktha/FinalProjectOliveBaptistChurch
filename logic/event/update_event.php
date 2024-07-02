<?php

require_once(__DIR__ . "/../connect.php");

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateBtn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $day = $conn->real_escape_string($_POST['day']);
    $month = $conn->real_escape_string($_POST['month']);
    $year = $conn->real_escape_string($_POST['year']);
    $title = $conn->real_escape_string($_POST['title']);
    $time = $conn->real_escape_string($_POST['time']);
    $description = $conn->real_escape_string($_POST['description']);

    // Prepare update query
    $sql = "UPDATE events SET day = ?, month = ?, year = ?, title = ?, time = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssssi", $day, $month, $year, $title, $time, $description, $id);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Event updated successfully.";
            $stmt->close();
            $conn->close();
            header("Location: ../../admin_view.php");
            exit;
        } else {
            $_SESSION['message'] = "Error updating event: " . $stmt->error;
        }
    } else {
        $_SESSION['message'] = "Error preparing statement: " . $conn->error;
    }
}

// Fetch event data after potential update to display in the form
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sqlSelect = "SELECT * FROM events WHERE id = $id";
$result = mysqli_query($conn, $sqlSelect);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $day = $row['day'];
    $month = $row['month'];
    $year = $row['year'];
    $title = $row['title'];
    $time = $row['time'];
    $description = $row['description'];
} else {
    $_SESSION['message'] = "Event not found.";
    header("Location: ../../admin_view.php");
    exit;
}
?>