<?php
include("connection.php");
session_start();
if(isset($_POST["update"]) and !empty($_POST["oldpass"]) and !empty($_POST["newpass"]) and !empty($_POST["confirmpass"]) )
  {
	$oldpass  = $_POST["oldpass"];
	$newpass = $_POST["newpass"];
	$confirmpass = $_POST["confirmpass"];
    $studentid=$_SESSION['stdname']['id'];
    $facultyid=$_SESSION['facultyname']['id'];
	$empid=$_SESSION['emp']['id'];
	  
	
	if($_SESSION['emp']['password'] == $oldpass)
	{
		if($newpass === $confirmpass)
		{
			$result = mysqli_query($con,"UPDATE employee SET password='$confirmpass' WHERE id='$empid'");
				  if($result)
				{
					$_SESSION["password"]="Password Sucessfully Updated!";
					
					header("location:employeedashboard.php");
					
				}
				else
				{
					$_SESSION["password"]="Update fail";
					header("location:updatepassword.php");
				}
		}else
		{
			$_SESSION["matchpassword"]="Password Does Not Match";
			header("location:updatepassword.php");
			exit();
		}
	}
	elseif($_SESSION['stdname']['password'] == $oldpass)
	{
		if($newpass === $confirmpass)
		{
			$result = mysqli_query($con,"UPDATE student SET password='$confirmpass' WHERE id='$studentid'");
				  if($result)
				{
					$_SESSION["password"]="Password Sucessfully Updated!";
					
				    header("location:studentdashboard.php");
					
				}
				else
				{
					$_SESSION["password"]="Update fail";
					header("location:updatepassword.php");
				}
		}else
		{
			$_SESSION["matchpassword"]="Password Does Not Match";
			header("location:updatepassword.php");
			exit();
		}
	}
	  else if($_SESSION['facultyname']['password'] == $oldpass)
	{
		if($newpass === $confirmpass)
		{
			$result = mysqli_query($con,"UPDATE faculty SET password='$confirmpass' WHERE id='$facultyid'");
				  if($result)
				{
					$_SESSION["password"]="Password Sucessfully Updated!";
					
					header("location:admin-index.php");
					
				}
				else
				{
					$_SESSION["password"]="Update fail";
					header("location:updatepassword.php");
				}
		}else
		{
			$_SESSION["matchpassword"]="Password Does Not Match";
			header("location:updatepassword.php");
			exit();
		}
	}
	  else
	{
		$_SESSION["oldpassword"]="Incorrect Password";
		header("location:updatepassword.php");
	}	  	
}else
  {
	  $_SESSION["required"]="Fill All Field's";
		header("location:updatepassword.php");
  }

?>

