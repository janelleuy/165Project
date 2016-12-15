<?php
session_start();
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";
$id=$_SESSION['id'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM salary WHERE ssn='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {
    // output data of each row
    echo '<table>
    <tr>
        <th>Year</th>
        <th>Type of Salary</th>
        <th>Salary</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)) {
    	echo '
        <tr>
            <td>'.$row['year'].'</td>
            <td>'.$row['type_of_salary'].'</td>
            <td>'.$row['salary_amount'].'</td>
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