<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
//session_start();
function viewStud(){
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
$sql = "SELECT DISTINCT * FROM student WHERE student_number=$id";
$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)==1){
		
		while($row=mysqli_fetch_assoc($result)){
			echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"].
			"<br>".$row["student_number"];
		}
		echo "<html><body><br><br>";
		echo "<form action='ssubject.php' method='post'>" ;
		echo "Year: <input name='year' type='text' />";
		echo "<input value='VIEW SCHEDULE' type='submit'  />";
		echo "</form>";
		echo "<form action='grade.php' method='post'> ";
		echo "<input value='VIEW GRADES' type='submit'  />";
		echo "</form>";
		echo "<form action='payment.php' method='post'>" ;
		echo "<input value='VIEW PAYMENT HISTORY' type='submit'  />";
		echo "</form>";
		echo "</body></html>";
	}
	else{
		echo 'shet';
	}
}
?>