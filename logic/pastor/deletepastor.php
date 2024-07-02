<?php

require_once(__DIR__ . "/../connect.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Fetch the pastor data to get the photo path
    $sqlOne = "SELECT * FROM pastors WHERE id = $id";
    $result = mysqli_query($conn, $sqlOne);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $photo = '../../' . $row['photo'];
        
        // Debug: print the photo path
        echo "Photo path: " . $photo . "<br>";

        // Delete the pastor's photo file
        if (file_exists($photo)) {
            unlink($photo);
            echo "Photo deleted successfully.<br>";
        } else {
            echo "Photo file does not exist.<br>";
        }

        // Delete the pastor data
        $sqlDeletePastor = "DELETE FROM pastors WHERE id = $id";
        if (mysqli_query($conn, $sqlDeletePastor)) {
            // Redirect after successful deletion
            header("Location: ../../adminpastor.php");
            exit();
        } else {
            echo "Error deleting pastor record: " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "Pastor not found or error fetching pastor data: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "Invalid ID provided.<br>";
}

?>
