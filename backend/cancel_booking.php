<?php
session_start();
include "config.php";

if (!isset($_SESSION['user'])) {
    echo json_encode(["status" => "error"]);
    exit();
}

$id = $_POST['id'];
$stmt = $conn->prepare("UPDATE bookings SET status='Cancelled' WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

echo json_encode(["status" => "success"]);
?>