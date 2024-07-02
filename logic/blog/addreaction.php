<?php
require_once(__DIR__ . "/../connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment_id = $_POST['comment_id'];
    $type = $_POST['type'];

    // Determine the column to update based on the reaction type
    $column = ($type === 'Love') ? 'loves' : 'likes';

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE comments SET $column = $column + 1 WHERE id = ?");
    $stmt->bind_param("i", $comment_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Reaction added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
