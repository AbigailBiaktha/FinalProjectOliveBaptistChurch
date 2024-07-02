<?php
require_once(__DIR__ . "/../connect.php");

// Fetch events from the database
$sql = "SELECT * FROM events ORDER BY year ASC, month ASC, day ASC";
$result = mysqli_query($conn, $sql);

// Return the result set
return $result;
?>
