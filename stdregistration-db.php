<?php
include("connection.php");
session_start();
if(isset($_POST["sub"]) and !empty($_POST["name"]) and !empty($_POST["password"]) and !empty($_POST["contact"]) and !empty($_POST["address"]) and !empty($_POST["scourse"]) and !empty($_POST["email"]))
{
	
	$name = $_POST["name"];	
	$email = $_POST["email"];	
	$password = $_POST["password"];
	$phonenumber = $_POST["contact"];
	$address = $_POST["address"];
	$course = $_POST["scourse"];

	$result = mysqli_query($con,"INSERT INTO student(name,email,password,phone,address,course_id) values('$name','$email','$password','$phonenumber','$address','$course')");
		if($result)
		{
			$_SESSION["Registration_add_msg"]="You Can Create Account Successfully!";
			header("location:stdregistration.php");
		}
		else
		{  
			$_SESSION["Registration_add_error"]="Check Again!";
			header("location:stdregistration.php.php");
			
		}
		
}
else
{   
	$_SESSION["Registration_add_error"]="Fill All Fields!";
	header("location:stdregistration.php.php");
}
	
?>
