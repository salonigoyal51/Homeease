<?php
include "config.php";

$service = $_GET['service'] ?? '';

$stmt = $conn->prepare("SELECT * FROM providers WHERE service = ?");
$stmt->bind_param("s", $service);
$stmt->execute();

$result = $stmt->get_result();
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(["status" => "success", "data" => $data]);
?>