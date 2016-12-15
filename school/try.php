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
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["student_number"]. " - Name: " . $row["first_name"]. " " . $row["middle_name"]. " " . $row["last_name"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 