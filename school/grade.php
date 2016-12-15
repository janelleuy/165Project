<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";
$sn = $_POST['sn'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM grade WHERE student_number='$sn'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '<table>
    <tr>
        <th>School Year</th>
        <th>Subject</th>
        <th>1st Quarter Grade</th>
        <th>2nd Quarter Grade</th>
        <th>3rd Quarter Grade</th>
        <th>4th Quarter Grade</th>
        <th>Final Grade</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)) {
    	echo '
        <tr>
            <td>'.$row['school_year'].'</td>
            <td>'.$row['subject'].'</td>
            <td>'.$row['q1_grade'].'</td>
            <td>'.$row['q2_grade'].'</td>
            <td>'.$row['q3_grade'].'</td>
            <td>'.$row['q4_grade'].'</td>
            <td>'.$row['final_grade'].'</td>
        </tr>';

	}
	echo '
	</table>';
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 