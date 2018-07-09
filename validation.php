<?php
$name= $_REQUEST['name'];
$city= $_REQUEST['city'];
$email= $_REQUEST['email'];
$description= $_REQUEST['description'];
$designation= $_REQUEST['designation'];
$state= $_REQUEST['state'];
$file= $_REQUEST['file'];
//echo $file;exit;
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


$sql = "INSERT INTO details (
name,
 email,
 description,
 designation,
 state,
 city,
 uploadfile
 )VALUES (
 '".$name."',
 '".$email."',
 '".$description."',
 '".$designation."',
 '".$state."',
 '".$city."',
 '".$file."'
 )";

if ($conn->query($sql) === TRUE) {
    //echo "1";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>