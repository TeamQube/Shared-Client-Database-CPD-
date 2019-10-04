<?php
include("connection.php");
session_start();
if(isset($_POST["ssub"]) And !empty($_POST["title"]) And !empty($_POST["description"]))
{
	$title = $_POST["title"];
	$description = $_POST["description"];
	$fid =$_SESSION["emp"]['id'];
	$file= $_FILES['file-input'];	
	$filename = $file['name'];
	$fileerror = $file['error'];
	$filetmp = $file['tmp_name'];
	$filestore = explode('.',$filename);
	$filecheck = strtolower(end($filestore));
	$filecheckstore = array('jpg','png','jpeg');
	if (in_array($filecheck,$filecheckstore))
	{
		$destinationfile ='images/employee/internships/'.$filename;
		move_uploaded_file($filetmp,$destinationfile);
	}
		
	$result = mysqli_query($con,"INSERT INTO internships(title,description,emp_id,image) values('$title','$description','$fid','$destinationfile')");
	if($result)
	{
		$_SESSION["Staff_infoadd"]="project Add Sucessfully";
		header("location:employeeinternship.php");
	}
	else
	{
		$_SESSION["Staff_infoadd"]="project Add To Fail";
		header("location:employeeinternship.php");
	}
}
else if(isset($_POST["update"]))
	{ 
	$id = $_POST["sid"];
	$title = $_POST["title"];
	$description = $_POST["description"];
	$image="";
	if(!empty($_FILES['file-input']['name'])){
		$files=$_FILES['file-input']['name'];
		move_uploaded_file($_FILES['file-input']['tmp_name'],"images/employee/internships/".$files);
		$image=",story_image='"."images/employee/internships/".$files."'";
		
	}
	$result = mysqli_query($con,"UPDATE internships SET title='$title',description='$description' $image WHERE id='$id'");

		if($result)
		{
			$_SESSION["Staff_infoadd"]="Information Update Sucessfully";
			header("location:employeeinternship.php");
		}
		else
		{
			$_SESSION["Staff_infoadd"]="Information Update fail";
			header("location:employeeinternship.php");
		}
	
	}
else
{
	$_SESSION["empty_field"]="Please! Fill All Fields";
	header("location:employeeinternship.php");
}
	
?>



