<?php
include("connection.php");
session_start();
if(isset($_POST["sub"]) and !empty($_POST["name"]) and !empty($_POST["password"]) and !empty($_POST["subject"]) and !empty($_POST["email"]))
{
	
	$name = $_POST["name"];	
	$email = $_POST["email"];	
	$password = $_POST["password"];
	$subject = $_POST["subject"];

	$result = mysqli_query($con,"INSERT INTO faculty(name,email,password,subject_id) values('$name','$email','$password','$subject')");
		if($result)
		{
			$_SESSION["Registration_add_msg"]="You Can Create Account Successfully!";
			header("location:Registration.php");
		}
		else
		{
			header("location:Registration.php");
			$_SESSION["Registration_add_error"]="Check Again!";
		}
		
}
else
{   
	$_SESSION["Registration_add_error"]="Fill All Fields!";
	header("location:Registration.php");
}
	
?>
