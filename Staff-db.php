<?php
include("connection.php");
session_start();
if(isset($_POST["ssub"]) And !empty($_POST["name"]) And !empty($_POST["fname"]) And !empty($_POST["semail"]) And !empty($_POST["phone"]) And !empty($_POST["address"])  And !empty($_POST["dob"]) And !empty($_POST["jd"]) And !empty($_POST["jobtitle"]) And !empty($_POST["salary"]) And !empty($_POST["file-input"]))
{
	$staffname = $_POST["name"];
	$fathernames = $_POST["fname"];
	$email = $_POST["email"];
	$phonenumber = $_POST["phone"];
	$address = $_POST["address"];
	$dateofbirth = $_POST["dob"];
	$joiningdate = $_POST["jd"];
	$jobtitle = $_POST["jobtitle"];
	$salary = $_POST["salary"];
	$file= $_FILES['file-input'];	
	$filename = $file['name'];
	$fileerror = $file['error'];
	$filetmp = $file['tmp_name'];
	$filestore = explode('.',$filename);
	$filecheck = strtolower(end($filestore));
	$filecheckstore = array('jpg','png','jpeg');
	if (in_array($filecheck,$filecheckstore))
	{
		$destinationfile ='images/staff/'.$filename;
		move_uploaded_file($filetmp,$destinationfile);
	}
		
	$result = mysqli_query($con,"INSERT INTO staff (name,father_name,email,phone,address,date_of_birth,joining_date,job_title,salary,image) values('$staffname','$fathernames','$email','$phonenumber','$address','$dateofbirth','$joiningdate','$jobtitle','$salary','$destinationfile')");
	if($result)
	{
		$_SESSION["Staff_infoadd"]="Information Insert Sucessfully";
		header("location:Staff.php");
	}
	else
	{
		$_SESSION["Staff_infoadd"]="Information Add To Fail";
		header("location:Staff.php");
	}
}
else if(isset($_POST["update"]))
	{ 
	$staffid = $_POST["sid"];
	$staffname = $_POST["name"];
	$fathernames = $_POST["fname"];
	$email = $_POST["email"];
	$phonenumber = $_POST["phone"];
	$address = $_POST["address"];
	$dateofbirth = $_POST["dob"];
	$joiningdate = $_POST["jd"];
	$jobtitle = $_POST["jobtitle"];
	$salary = $_POST["salary"];
	$image="";
	if(!empty($_FILES['file-input']['name'])){
		$files=$_FILES['file-input']['name'];
		move_uploaded_file($_FILES['file-input']['tmp_name'],"images/staff/".$files);
		$image=",image='"."images/faculty/".$files."'";
		
	}
	$result = mysqli_query($con,"UPDATE staff SET name='$staffname', email='$email', father_name='$fathernames', phone='$phonenumber', address='$address', date_of_birth='$dateofbirth', job_title='$jobtitle', salary='$salary' $image WHERE id='$staffid'");

		if($result)
		{
			$_SESSION["Staff_infoadd"]="Information Update Sucessfully";
			header("location:Staff.php");
		}
		else
		{
			$_SESSION["Staff_infoadd"]="Information Update fail";
			header("location:Staff.php");
		}
	
	}
else
{
	$_SESSION["empty_field"]="Please! Fill All Fields";
	header("location:Staff.php");
}
	
?>
