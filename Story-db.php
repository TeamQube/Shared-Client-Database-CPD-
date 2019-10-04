<?php
include("connection.php");
session_start();
if(isset($_POST["ssub"]) And !empty($_POST["title"]) And !empty($_POST["description"]))
{
	$storytitle = $_POST["title"];
	$storydescription = $_POST["description"];
	$file= $_FILES['file-input'];	
	$filename = $file['name'];
	$fileerror = $file['error'];
	$filetmp = $file['tmp_name'];
	$filestore = explode('.',$filename);
	$filecheck = strtolower(end($filestore));
	$filecheckstore = array('jpg','png','jpeg');
	if (in_array($filecheck,$filecheckstore))
	{
		$destinationfile ='images/story/'.$filename;
		move_uploaded_file($filetmp,$destinationfile);
	}
		
	$result = mysqli_query($con,"INSERT INTO story (story_title	,story_description,story_image) values('$storytitle','$storydescription','$destinationfile')");
	if($result)
	{
		$_SESSION["Staff_infoadd"]="Story Add Sucessfully";
		header("location:Story.php");
	}
	else
	{
		$_SESSION["Staff_infoadd"]="Story Add To Fail";
		header("location:Story.php");
	}
}
else if(isset($_POST["update"]))
	{ 
	$storyid = $_POST["sid"];
	$storytitle = $_POST["title"];
	$storydescription = $_POST["description"];
	$image="";
	if(!empty($_FILES['file-input']['name'])){
		$files=$_FILES['file-input']['name'];
		move_uploaded_file($_FILES['file-input']['tmp_name'],"images/story/".$files);
		$image=",story_image='"."images/story/".$files."'";
		
	}
	$result = mysqli_query($con,"UPDATE story SET story_title='$storytitle', story_description='$storydescription' $image WHERE id='$storyid'");

		if($result)
		{
			$_SESSION["Staff_infoadd"]="Information Update Sucessfully";
			header("location:Story.php");
		}
		else
		{
			$_SESSION["Staff_infoadd"]="Information Update fail";
			header("location:Story.php");
		}
	
	}
else
{
	$_SESSION["empty_field"]="Please! Fill All Fields";
	header("location:Story.php");
}
	
?>

