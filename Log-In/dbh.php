<?php

$conn = mysqli_connect("localhost", "root", "", "mp165");
if (!$conn){
	die("Connection Failed: ".mysqli_connect_error());
}