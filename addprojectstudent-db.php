<?php
include("connection.php");
session_start();
if(isset($_POST["ssub"]) And !empty($_POST["studentid"]))
{
	$student = $_POST["studentid"];
	$internship = $_POST["internship"];
	$industry = $_POST["industry"];
	$assign = $_POST["assign"];
	$fid = $_SESSION["facultyname"]["id"];
	$result = mysqli_query($con,"INSERT INTO stdapplyforjob (name,internship,industry,assign,facutlyid) values('$student','$internship','$industry','$assign','$fid')");
	if($result)
	{
		$_SESSION["Staff_infoadd"]="Project Add Sucessfully";
		header("location:addprojectstudent.php");
	}
	else
	{
		$_SESSION["Staff_infoadd"]="Project Add To Fail";
		header("location:addprojectstudent.php");
	}
}
else
{
	$_SESSION["empty_field"]="Please! Fill All Fields";
	header("location:addprojectstudent.php");
}
	
?>


