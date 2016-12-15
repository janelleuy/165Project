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

$sql = "SELECT * FROM payment_details WHERE student_number='$sn'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '<table>
    <tr>
        <th>School Year</th>
        <th>Remaining Balance</th>
        <th>Tuition Fee</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)) {
    	echo '
        <tr>
            <td>'.$row['school_year'].'</td>
            <td>'.$row['remaining_balance'].'</td>
            <td>'.$row['tuition_fee'].'</td>
        </tr>';

	}
	echo '
	</table>';
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 