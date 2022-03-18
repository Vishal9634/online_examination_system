<?php
$conn=mysqli_connect("localhost","root","");
if(!$conn)
{
	die("Error in Connection".mysqli_error());
}
mysqli_select_db($conn,"online-quiz");
?>