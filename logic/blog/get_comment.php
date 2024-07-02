<?php
require_once(__DIR__ . "/../connect.php");

$blog_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT name, comment, created_at FROM comments WHERE blog_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $blog_id);
$stmt->execute();
$comments_result = $stmt->get_result();
$stmt->close();


?>
