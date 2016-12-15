<?php
session_start();
function checker(){
$servername = "localhost";
$username = "root";
$password = "";
$db="cs_165";
$conn = mysqli_connect($servername, $username, $password, $db );
$id=$_SESSION['id'];
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT DISTINCT * FROM student WHERE student_number=$id";
$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)==1){
		return 1; //student logged in
	}
	else if (mysqli_num_rows($result)==0){
		$sql = "SELECT DISTINCT * FROM teacher WHERE ssn=$id";
		$result1 = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result1)==1){

		return 2;// teacher logged in
		}
	}
}
?>