<?php
session_start();
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";
$year = $_POST['year'];
$id=$_SESSION['id'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM subject natural join enrolled WHERE student_number='$id' and school_year='$year'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '<table>
    <tr>
        <th>Subject</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Room Number</th>
        <th>SSN</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)) {
    	echo '
        <tr>
            <td>'.$row['subject'].'</td>
            <td>'.$row['start_time'].'</td>
            <td>'.$row['end_time'].'</td>
            <td>'.$row['room_number'].'</td>
            <td>'.$row['ssn'].'</td>
        </tr>';

	}
	echo '
	</table>';
} else {
    echo "0 results";
}
echo "<html><body>";
echo "<form action='logIn.php' method='post'> ";
echo "<input type='button' value='back' onClick='history.go(-1)'/>";
echo "</form>";
echo "</body></html>";
mysqli_close($conn);
?> 