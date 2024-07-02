<?php
require_once(__DIR__ . "/../connect.php");

function getContactMessages() {
    global $conn;

    $sql = "SELECT id, name, email, subject, message FROM contacts ORDER BY id DESC";
    $result = $conn->query($sql);

    $messages = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }

    return $messages;
}
?>