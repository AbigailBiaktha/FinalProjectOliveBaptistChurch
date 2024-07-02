<?php

require_once(__DIR__ . "/../connect.php");
$sql = "SELECT * FROM albums";
$result = $conn->query($sql);

$albums = array();
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $albums[] = $row;
    }
}

$conn->close();

return $albums;
?>