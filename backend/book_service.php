
<?php
session_start();
include "config.php";

if (!isset($_SESSION['user'])) {
    echo json_encode([
        "status" => "error",
        "message" => "User not logged in"
    ]);
    exit();
}

$user = $_SESSION['user'];
$service = $_POST['service'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';
$address = $_POST['address'] ?? '';

$stmt = $conn->prepare("INSERT INTO bookings (user, service, date, time, address) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $user, $service, $date, $time, $address);

if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}
?>