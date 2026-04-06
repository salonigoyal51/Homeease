<?php
session_start();
include "config.php";

$user = $_SESSION['user'];

$result = $conn->query("SELECT * FROM bookings WHERE user='$user'");

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>