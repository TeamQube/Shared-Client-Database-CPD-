<?php
include("connection.php");
if(isset($_GET["id"]) and !empty($_GET["id"]))
{
	$result = mysqli_query($con,"select * from student WHERE id=".$_GET["id"]);
	foreach($result as $row);
	$studentid = $row["sid"];
	$studentname = $row["sname"];
	$fathernames = $row["fname"];
	$email = $row["semail"];
	$phonenumber = $row["sphone"];
	$address = $row["saddress"];	
	$dateofbirth = $row["sdob"];	
	$course = $row["scourse"];
	
}
if(isset($_POST["ssub"]))
  {
	$studentid  = $_POST["sid"];
	$studentname = $_POST["sname"];
	$fathernames = $_POST["fname"];
	$email = $_POST["semail"];
	$phonenumber = $_POST["sphone"];
	$address = $_POST["saddress"];	
	$dateofbirth = $_POST["sdob"];	
	$course = $_POST["scourse"];
	  
	$result = mysqli_query($con,"UPDATE student SET name='$studentname', email='$email', father_name='$fathernames', phone='$phonenumber', address='$address',date_of_birth='$dateofbirth',course_id='$course' WHERE id='$studentid'");
	  if($result)
	{
		$_SESSION["Student_infoadd"]="Information Add Sucessfully";
		header("location:studentdashboard.php?id=".$studentid);
	}
	else
	{
		$_SESSION["Student_infoadd"]="Information Add fail";
		header("location:studentdashboard.php?id=".$studentid);
	}
}

?>

