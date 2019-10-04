<?php
include("connection.php");
session_start();
if(isset($_POST["ssub"]) And !empty($_POST["subject"]))
{
	
	$subject = $_POST["subject"];
	
	$result = mysqli_query($con,"INSERT INTO subject (name) values('$subject')");
	if($result)
	{
		$_SESSION["subject_add_msg"]="You Successfully Add This Subject";
		header("location:Subject.php");
	}
	else
	{
		header("location:Subject.php");
		$_SESSION["subject_add_msg"]="Subject Add To Fail";
	}
}else if(isset($_POST["update"]))
	{ 
	$subjectid = $_POST["sid"];
	$subject = $_POST["subject"];
		
	$result = mysqli_query($con,"UPDATE subject SET name='$subject' WHERE id='$subjectid'");

		if($result)
		{
			$_SESSION["subject_add_msg"]="Information Update Sucessfully";
			header("location:Subject.php");
		}
		else
		{
			$_SESSION["subject_add_msg"]="Information Update fail";
			header("location:Subject.php");
		}
	
	}
else
{
	$_SESSION["empty_field"]="Please! Fill All Fields";
	header("location:Subject.php");
}
	
?>
