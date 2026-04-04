<?php
session_start();
include "config.php";

$user = $_SESSION['user'];

$name = $_POST['name'];
$email = $_POST['email'];

$conn->query("UPDATE users SET name='$name', email='$email' WHERE name='$user'");

$_SESSION['user'] = $name;

echo "updated";
?>