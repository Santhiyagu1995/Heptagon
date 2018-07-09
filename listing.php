<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM `details` ";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<th>Name</th><th>Email</th><th>EMP ID</th><th>EMP ID</th>";
while($row = mysqli_fetch_array($result))
{	
	echo "<tr><td>".$row['name']."</td><td>".$row['emp_id']."</td><td>".$row['email']."</td><td>" . $row['uploadfile']."</td></tr>";
}

echo "</table>";

?>