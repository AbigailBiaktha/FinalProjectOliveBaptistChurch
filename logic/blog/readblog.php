<?php

require_once(__DIR__ . "/../connect.php");

$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);

