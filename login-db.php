<?php
session_start();
include("connection.php");
if(isset($_POST["studentbtn"]))
{
	$username=$_POST["sname"];
	$password=$_POST["spassword"];
	
		//student login
		$qurey="select * from student where name='$username' and password='$password'";
		$result=mysqli_query($con,$qurey);
		if(mysqli_num_rows($result))
		{
		foreach($result as $data);	
		$_SESSION["stdname"]=$data;	
		header("location:studentdashboard.php?id=".$_SESSION['stdname']['id']);
		}	
		if(!mysqli_num_rows($result))
		{
			$_SESSION["error"] ="Wrong Username And Password ";
			header("location:student-login.php");
			
		}
}
if(isset($_POST["employeebtn"]))
{
	$username=$_POST["ename"];
	$password=$_POST["epassword"];
	
		//student login
		$qurey="select * from employee where username='$username' and password='$password'";
		$result=mysqli_query($con,$qurey);
		if(mysqli_num_rows($result))
		{
		foreach($result as $data);	
		$_SESSION["emp"]=$data;	
		header("location:employeedashboard.php?id=".$_SESSION['emp']['id']);
		}	
		if(!mysqli_num_rows($result))
		{
			$_SESSION["error"] ="Wrong Username And Password ";
			header("location:employee-login.php");
			
		}
}


if (isset($_POST["facultybtn"]))
{
	$username=$_POST["staffname"];
	$password=$_POST["staffpassword"];
	
	
	//faculty login
	$qurey="select * from faculty where name='$username' and password='$password'";
	$result=mysqli_query($con,$qurey);
	if(mysqli_num_rows($result))
	{
	foreach($result as $data);	
	$_SESSION["facultyname"]=$data;	
	header("location:admin-index.php?id=".$_SESSION['facultyname']['id']);
	}
	
	if(!mysqli_num_rows($result))
	{
		$_SESSION["error"] ="Wrong Username And Password ";
		header("location:faculty-login.php");
		
	}
		
}





























?>