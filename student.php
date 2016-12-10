<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '<table>
    <tr>
        <th>Student Number</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)) {
    	echo '
        <tr>
            <td>'.$row['student_number'].'</td>
            <td>'.$row['first_name'].'</td>
            <td>'.$row['middle_name'].'</td>
            <td>'.$row['last_name'].'</td>
        </tr>';

	}
	echo '
	</table>';
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 