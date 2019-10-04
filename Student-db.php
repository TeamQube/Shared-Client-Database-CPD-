<?php
include("connection.php");
session_start();
if(isset($_POST["ssub"]) And !empty($_POST["sname"]) And !empty($_POST["fname"]) And !empty($_POST["semail"]) And !empty($_POST["sphone"]) And !empty($_POST["saddress"]) And !empty($_POST['sfaculty']) And !empty($_POST["sdob"]) And !empty($_POST["sjd"]) And !empty($_POST["ssession"]) And !empty($_POST["scourse"]))
{
	$studentname = $_POST["sname"];
	$fathernames = $_POST["fname"];
	$email = $_POST["semail"];
	$phonenumber = $_POST["sphone"];
	$address = $_POST["saddress"];
	$faculty = $_POST['sfaculty'];
	$dateofbirth = $_POST["sdob"];
	$joiningdate = $_POST["sjd"];
	$password = $_POST["spassword"];
	$session = $_POST["ssession"];
	$course = $_POST["scourse"];
	$file= $_FILES['file-input'];	
	$filename = $file['name'];
	$fileerror = $file['error'];
	$filetmp = $file['tmp_name'];
	$filestore = explode('.',$filename);
	$filecheck = strtolower(end($filestore));
	$filecheckstore = array('jpg','png','jpeg');
	if (in_array($filecheck,$filecheckstore))
	{
		$destinationfile ='images/student/'.$filename;
		move_uploaded_file($filetmp,$destinationfile);
	}
		
	$result = mysqli_query($con,"INSERT INTO student (name,father_name,email,phone,address,date_of_birth,joining_date,faculty_id,session_id,course_id,password,image) values('$studentname','$fathernames','$email','$phonenumber','$address','$dateofbirth','$joiningdate','$faculty','$session','$course','$password','$destinationfile')");
	if($result)
	{
		$_SESSION["Student_infoadd"]="Information Add Sucessfully";
		header("location:Student.php");
	}
	else
	{
		$_SESSION["Student_infoadd"]="Information Add fail";
		header("location:Student.php");
	}
}

elseif(isset($_POST["update"]))
{
	$studentid = $_POST["sid"];
	$studentname = $_POST["sname"];
	$fathernames = $_POST["fname"];
	$email = $_POST["semail"];
	$phonenumber = $_POST["sphone"];
	$address = $_POST["saddress"];
	$faculty = $_POST['sfaculty'];
	$dateofbirth = $_POST["sdob"];
	$joiningdate = $_POST["sjd"];
	$session = $_POST["ssession"];
	
	$changecourse="";
	$checkdate=mysqli_query($con,"select * from session where id='$session'");
	foreach($checkdate as $courdeduration);
	if($courdeduration['ending_date'] < date('Y-m-d')){
	 $changecourse=",course_id='".$_POST["scourse"]."'";
	}else
	{
		$_SESSION["Student_coursealert"]="Cant change couse during mid of session";
		header("location:Student.php");
		exit();
	}
	
	$image="";
	if(!empty($_FILES['file-input']['name'])){
		$files=$_FILES['file-input']['name'];
		move_uploaded_file($_FILES['file-input']['tmp_name'],"images/student/".$files);
		$image=",image='"."images/student/".$files."'";
		
	}
	$password = "";
	if(!empty($_POST["spassword"])){
		$password =",password='".$_POST["spassword"]."'";		
	}	
	$result = mysqli_query($con,"UPDATE student SET name='$studentname', email='$email', father_name='$fathernames', phone='$phonenumber', address='$address',date_of_birth='$dateofbirth',faculty_id='$faculty',session_id='$session' $changecourse$password$image WHERE id='$studentid'");
	
	if($result)
	{
		$_SESSION["Student_infoadd"]="Information Update Sucessfully";
		header("location:Student.php");
	}
	else
	{
		$_SESSION["Student_infoadd"]="Information Update fail";
		header("location:Student.php");
	}
}
else
{
	$_SESSION["empty_field"]="Please! Fill All Fields";
     header("location:Student.php");
}
	
?>
