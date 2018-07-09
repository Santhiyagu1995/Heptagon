<?php
$name= $_REQUEST['name'];
$city= $_REQUEST['city'];
$email= $_REQUEST['email'];
$description= $_REQUEST['description'];
$designation= $_REQUEST['designation'];
$state= $_REQUEST['state'];
$uploadedfile= $_REQUEST['uploadedfile'];
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

/* For file upload in Particular folder starts*/
	$document = basename($_FILES["uploadedfile"]['name']);
	if($document != "")
	{ 
		$file_path = Upload_file."/".$document;
	}
	if($_FILES["uploadedfile"]["name"] != '')
	{
		if(is_dir(Upload_file))
		{
			chmod(Upload_file);
		}
		else
		{
			if (!mkdir(Upload_file, 0777, true)) {
				header('location:index.php?rt=report/erroranalysis&suc='.base64_encode(2));
				exit;
			}
			chmod(Upload_file,0777);
		}
		 $file_name = basename($_FILES["uploadedfile"]['name']);
		 $doclocation = 'Upload_file/'.$file_name;
		 move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $file_path);
	}
	$selectQuery = "SELECT max(id) AS maxid FROM details";
	$result=$conn->query($selectQuery);
	$row=mysqli_fetch_assoc($result);
if($row['maxid'] != "")
{
	$maxval = $row['maxid']+1;
}else
{
	$maxval = 1;
}

$ldigitvalue = str_pad($maxval,3,'0',STR_PAD_LEFT);
$empid = "EMP-".$ldigitvalue;	
/* For file upload in Particular folder Ends*/
$insertQry = "INSERT INTO details (
name,
 email,
 description,
 designation,
 state,
 city,
 uploadfile,
 file_path,
 emp_id
 )VALUES (
 '".$name."',
 '".$email."',
 '".$description."',
 '".$designation."',
 '".$state."',
 '".$city."',
 '".$file_name."',
 '".$doclocation."',
 '".$empid."'
 )";
if ($conn->query($insertQry) === TRUE) {
    echo "1";
} else {
    echo "Error: " . $insertQry . "<br>" . $conn->error;
}

$conn->close();
?>