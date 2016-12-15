<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
//session_start();
function viewTeach(){
$servername = "localhost";
$username = "root";
$password = "";
$db="school";
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
		echo "<html><body><br><br>";
		echo "<form action='salary.php' method='post'> ";
		echo "<input value='VIEW SALARY HISTORY' type='submit'/>";
		echo "</form>";
		echo "<form action='tsubject.php' method='post'> ";
		echo "YEAR: <input name='year' type='text' /> ";
		echo "<input value='VIEW SCHEDULE' type='submit'/>";
		echo "</form>";
		echo "</body></html>";
	}
	else{
		echo 'shet';
	}
}
?>