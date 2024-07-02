<?php

require_once(__DIR__ . "/../connect.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Delete event from database
    $sqlDelete = "DELETE FROM events WHERE id = $id";
    
    if (mysqli_query($conn, $sqlDelete)) {
        // Redirect after successful deletion
        header("Location: ../../admin_view.php");
        exit();
    } else {
        echo "Error deleting event: " . mysqli_error($conn);
    }
} else {
    echo "Invalid ID provided.";
}

?>
