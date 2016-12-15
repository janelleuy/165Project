<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
$servername = "localhost";
$username = "root";
$password = "";
$db="school";
include 'viewStud.php';
include 'viewTeach.php';
include 'check.php';
//include 'another.php';
// Create connection
session_start();
$conn = mysqli_connect($servername, $username, $password, $db );
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
/*$_SESSION['user']=$username;
echo $_SESSION['user'];
if(!empty($_SESSION['user']))*/
//session_start();
$_SESSION['id']='';
if(isset($_POST['submit'])){
	if(!empty($_POST['username'] && $_POST['password'])){
		
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM login WHERE username= '$username' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		
		//$exist = mysqli_num_rows($result);
		
		if(mysqli_num_rows($result)==1){
			while($row=mysqli_fetch_assoc($result)){
			$_SESSION['id']=$row["username"];
			}
			if(checker()==1){
				viewStud();
			}
			else if (checker()==2){
				viewTeach();
			}
			//another();
			/*echo "<br>"."<br>"."<br>";
			echo "<html>";
			echo "<body>";
			echo "<form action='logIn.php' method='post'>";
			echo  "Schedule:<br>";
			echo  "<input type='text' name='username'><br>";
			echo  "<input type='submit' value='submit' name='submit'>";
			echo "</form>";
			echo "</body>";
			echo "</html>";*/
			
		
		}
		
		else if(mysqli_num_rows($result)==0){
			
			echo "error in login ";//. $result->error;
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