<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'covid') or die(json_encode(['error' => 'DB connection failed']));
mysqli_query($con, "SET NAMES 'utf8mb4'");
?>