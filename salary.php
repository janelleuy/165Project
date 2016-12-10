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

$sql = "SELECT * FROM salary";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '<table>
    <tr>
        <th>SSN</th>
        <th>Year</th>
        <th>Type of Salary</th>
        <th>Salary</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)) {
    	echo '
        <tr>
            <td>'.$row['ssn'].'</td>
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

mysqli_close($conn);
?> 