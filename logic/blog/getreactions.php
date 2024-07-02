<?php
require_once(__DIR__ . "/../connect.php");

$comment_id = $_GET['comment_id'];

$sql = "SELECT type, COUNT(*) as count FROM reactions WHERE comment_id = ? GROUP BY type";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $comment_id);
$stmt->execute();
$result = $stmt->get_result();

$reactions = [];
while ($row = $result->fetch_assoc()) {
    $reactions[$row['type']] = $row['count'];
}

echo json_encode($reactions);

$stmt->close();
$conn->close();
?>
