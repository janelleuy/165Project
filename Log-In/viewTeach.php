<?php
//session_start();
function viewTeach(){
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
$sql = "SELECT DISTINCT * FROM teacher WHERE ssn=$id";
$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)==1){
		
		while($row=mysqli_fetch_assoc($result)){
			echo $row["first_name"]." ".$row["last_name"].
			"<br>".$row["ssn"];
		}
		
	}
	else{
		echo 'shet';
	}
}
?>