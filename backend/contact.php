<?php
include "config.php";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$conn->query("INSERT INTO contact (name,email,message)
VALUES ('$name','$email','$message')");

echo "success";
?>