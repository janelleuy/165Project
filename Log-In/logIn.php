<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="cs_165";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db );

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
/*$_SESSION['user']=$username;

echo $_SESSION['user'];

if(!empty($_SESSION['user']))*/

if(isset($_POST['submit'])){
	if(!empty($_POST['username'] && $_POST['password'])){
		
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM login WHERE username= '$username' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		
		//$exist = mysqli_num_rows($result);
		
		if(mysqli_num_rows($result)==1){
			
			echo "logged in";
			
		}
		else if(mysqli_num_rows($result)==0){
			
			echo "error ";//. $result->error;
			
		}
		
		
		//echo 'submitted';
		
	}
	else if(empty($_POST['username'] && $_POST['password'])){
		echo "fill up everything";
	}
	else if(empty($_POST['username'])){
			echo "fill up username";
	}
	
	else if (empty($_POST['password'])){
		echo "fill up password";
	}
	

	
	
}


?>