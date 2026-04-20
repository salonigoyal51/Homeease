<?php
include "config.php";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

echo json_encode(["status" => "success"]);
?>