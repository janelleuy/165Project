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

$sql = "SELECT * FROM subject";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '<table>
    <tr>
        <th>Subject</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Year Number</th>
        <th>Section</th>
        <th>Room Number</th>
        <th>School Year</th>
        <th>SSN</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)) {
    	echo '
        <tr>
            <td>'.$row['subject'].'</td>
            <td>'.$row['start_time'].'</td>
            <td>'.$row['end_time'].'</td>
            <td>'.$row['year_number'].'</td>
            <td>'.$row['section'].'</td>
            <td>'.$row['room_number'].'</td>
            <td>'.$row['school_year'].'</td>
            <td>'.$row['ssn'].'</td>
        </tr>';

	}
	echo '
	</table>';
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 