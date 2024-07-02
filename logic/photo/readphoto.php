<?php
require_once(__DIR__ . "/../connect.php");

if (!isset($_GET['album_id'])) {
    die("Album ID not specified.");
}

$album_id = $_GET['album_id'];

$sql = "SELECT * FROM album_photos WHERE album_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $album_id);
$stmt->execute();
$result = $stmt->get_result();
?>
