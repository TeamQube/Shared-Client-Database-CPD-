<?php
include("connection.php");
session_start();
if(isset($_POST["sub"]) and !empty($_POST["name"]) and !empty($_POST["password"]) and !empty($_POST["cname"]) and !empty($_POST["contact"]))
{
	
	$name = $_POST["name"];	
	$cname = $_POST["cname"];	
	$password = $_POST["password"];
	$contact = $_POST["contact"];

	$result = mysqli_query($con,"INSERT INTO employee(username,password,cname,contact) values('$name','$password','$cname','$contact')");
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
