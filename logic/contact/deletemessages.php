<?php

require_once(__DIR__ . "/../connect.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Delete the message data from the database
    $sqlDeleteMessage = "DELETE FROM contacts WHERE id = $id";
    
    if (mysqli_query($conn, $sqlDeleteMessage)) {
        // Redirect after successful deletion
        header("Location: ../../contactmessage.php");
        exit();
    } else {
        echo "Error deleting message: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "Invalid ID provided.<br>";
}

?>
