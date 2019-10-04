<?php
include("connection.php");
session_start();
if(isset($_POST["ssub"]) And !empty($_POST["sessiontime"]) And !empty($_POST["scourse"]) And !empty($_POST["startingdate"]) And !empty($_POST["endingdate"]))
{
	
	$sessiontime = $_POST["sessiontime"];
	$course = $_POST["scourse"];
	$startingdate = $_POST["startingdate"];
	$endingdate = $_POST["endingdate"];
	$checkresult = mysqli_query($con,"select * from session");
	foreach($checkresult as $confirmcheck);

		if($sessiontime == $confirmcheck[ 'time'] and $course == $confirmcheck ['course_id'] and $startingdate == $confirmcheck['starting_date'])
			{  
				$_SESSION["empty_field"]="This Session Already Taken!";
	            header("location:Session.php");
				exit();
					
			}else
			{
				$result = mysqli_query($con,"INSERT INTO session (time,course_id,starting_date,ending_date) values('$sessiontime','$course','$startingdate','$endingdate')");
					if($result)
					{   
						$_SESSION["Session_add_msg"]="Information Insert Sucessfully";
						header("location:Session.php");
					}
					else
					{
						$_SESSION["Session_add_msg"]="Information Add To Fail";
						header("location:Session.php");
					}
			}
	
}
else if(isset($_POST["update"]))
	{ 
	$sessionid = $_POST["sid"];
	$sessiontime = $_POST["sessiontime"];
	$startingdate = $_POST["startingdate"];
	$endingdate = $_POST["endingdate"];
	$course = $_POST["scourse"];
    $checkresult = mysqli_query($con,"select * from session");
	foreach($checkresult as $confirmcheck);
	if($sessiontime == $confirmcheck[ 'time'] and $course == $confirmcheck ['course_id'] and $startingdate == $confirmcheck['starting_date'])
		{  
			$_SESSION["empty_field"]="This Session Already Taken!";
			header("location:Session.php");
			exit();

		}else
		{
		   $result = mysqli_query($con,"UPDATE session SET time='$sessiontime', course_id='$course', starting_date='$startingdate', ending_date='$endingdate' WHERE id='$sessionid'");

			if($result)
			{
				$_SESSION["Session_add_msg"]="Information Update Sucessfully";
				header("location:Session.php");
			}
			else
			{
				$_SESSION["Session_add_msg"]="Information Update fail";
				header("location:Session.php");
			}
		}
	}
else
{   
	$_SESSION["empty_field"]="Please! Fill All Fields";
	header("location:Session.php");
}
	
?>