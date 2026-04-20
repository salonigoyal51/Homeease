<?php
session_start();
include "config.php";
if(!isset($_SESSION['user'])){
    echo json_encode(["status" => "error", "message" => "Not logged in"]);
    exit();
}

$user = $_SESSION['user'];
$name = $_POST['name'];
$email = $_POST['email'];

$stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE name=?");
$stmt->bind_param("sss", $name, $email, $user);
$stmt->execute();
$_SESSION['user'] = $name;
echo json_encode(["status" => "success"]);
?>