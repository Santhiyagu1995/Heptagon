<?php
$username = $_REQUEST['uname'];
$password = $_REQUEST['psw'];
 $file = file_put_contents("test.txt","User Name:".$username."||"."Password:".$password);
 if($file>0)
 {
	 echo"Your Text File is created Successfully";echo"<br><br>";
	 echo readfile("test.txt");
 }
?>