<?php
session_start();
include "config.php";

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Not logged in"
    ]);
    exit();
}

$user = $_SESSION['user'];

// Secure query (important 🔐)
$stmt = $conn->prepare("SELECT * FROM bookings WHERE user = ?");
$stmt->bind_param("s", $user);
$stmt->execute();

$result = $stmt->get_result();

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode([
    "status" => "success",
    "data" => $data
]);
?>