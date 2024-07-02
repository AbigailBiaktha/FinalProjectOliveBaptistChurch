<?php
require_once(__DIR__ . "/../connect.php");

$blog_id = intval($_POST['blog_id']);
$name = $conn->real_escape_string($_POST['name']);
$comment = $conn->real_escape_string($_POST['comment']);

// Debugging prints
echo "blog_id: " . $blog_id . "<br>";
echo "name: " . $name . "<br>";
echo "comment: " . $comment . "<br>";

// Check if the blog_id exists in the blogs table
$blog_check_sql = "SELECT id FROM blogs WHERE id = ?";
$blog_check_stmt = $conn->prepare($blog_check_sql);
$blog_check_stmt->bind_param("i", $blog_id);
$blog_check_stmt->execute();
$blog_check_result = $blog_check_stmt->get_result();

if ($blog_check_result->num_rows > 0) {
    // Proceed with inserting the comment if the blog_id exists
    $sql = "INSERT INTO comments (blog_id, name, comment, created_at) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $blog_id, $name, $comment);

    if ($stmt->execute()) {
        header("Location: ../../blog_post.php?id=$blog_id");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: The blog post does not exist.";
}

$blog_check_stmt->close();
$conn->close();
?>