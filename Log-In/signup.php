<?php
include 'dbh.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO login (username,password) values ('$username', '$password')";
$result = $conn->query($sql);

header("Location: logintest.html");
?>