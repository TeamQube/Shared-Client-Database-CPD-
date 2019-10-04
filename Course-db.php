<?php
include("connection.php");
session_start();

if(isset($_POST["ssub"]) And !empty($_POST["coursename"]) And !empty($_POST["subject"]))
{
	
	$coursename = $_POST["coursename"];
	$subject = $_POST["subject"];
	
    $selected="";
    $index=0;
	foreach ($_POST['subject'] as $subject)  {
		if($index==0){
			$selected.=$subject;
			$index=1;
		}else{
			$selected.=','.$subject;
		}
		
	}
        
	$result = mysqli_query($con,"INSERT INTO course (name,subject) values('$coursename','$selected')");
	if($result)
	{
		$_SESSION["Course_infoadd"]="Information Insert Sucessfully";
		header("location:Course.php");
	}
	else
	{
		$_SESSION["Course_infoadd"]="Information Add To Fail";
		header("location:Course.php");
	}
}else if(isset($_POST["update"]))
	{ 
	$courseid = $_POST["sid"];
	$coursename = $_POST["coursename"];
	$subject = $_POST["subject"];
		
	$selected="";
    $index=0;
	foreach ($_POST['subject'] as $subject)  {
		if($index==0){
			$selected.=$subject;
			$index=1;
		}else{
			$selected.=','.$subject;
		}
		
	}
	
	$result = mysqli_query($con,"UPDATE course SET name='$coursename', subject='$selected' WHERE id='$courseid'");

		if($result)
		{
			$_SESSION["Course_infoadd"]="Information Update Sucessfully";
			header("location:Course.php");
		}
		else
		{
			$_SESSION["Course_infoadd"]="Information Update fail";
			header("location:Course.php");
		}
	
	}
else
{
	$_SESSION["empty_field"]="Please! Fill All Fields";
	header("location:Course.php");
}
	
?>
