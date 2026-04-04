<?php
session_start();
include "config.php";


$user = $_SESSION['user'];
$service = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];
$address = $_POST['address'];

$sql = "INSERT INTO bookings (user,service,date,time,address)
VALUES ('$user','$service','$date','$time','$address')";

if ($conn->query($sql)) {
    echo "success";
} else {
    echo "error";
}
?>