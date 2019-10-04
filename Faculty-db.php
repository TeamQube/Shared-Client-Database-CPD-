<?php
include("connection.php");
session_start();
if(isset($_POST["ssub"]) And !empty($_POST["name"]) And !empty($_POST["fname"]) And !empty($_POST["email"]) And !empty($_POST["phone"]) And !empty($_POST["address"])  And !empty($_POST["dob"]) And !empty($_POST["jd"]) And !empty($_POST["jobtitle"]) And !empty($_POST["salary"]) And !empty($_POST["subject"]) And !empty($_POST["password"]))
{
	$facultyname = $_POST["name"];
	$fathernames = $_POST["fname"];
	$email = $_POST["email"];
	$phonenumber = $_POST["phone"];
	$address = $_POST["address"];
	$dateofbirth = $_POST["dob"];
	$joiningdate = $_POST["jd"];
	$jobtitle = $_POST["jobtitle"];
	$password = $_POST["password"];
	$salary = $_POST["salary"];
	$subject = $_POST["subject"];
	$file= $_FILES['file-input'];	
	$filename = $file['name'];
	$fileerror = $file['error'];
	$filetmp = $file['tmp_name'];
	$filestore = explode('.',$filename);
	$filecheck = strtolower(end($filestore));
	$filecheckstore = array('jpg','png','jpeg');
	if (in_array($filecheck,$filecheckstore))
	{
		$destinationfile ='images/faculty/'.$filename;
		move_uploaded_file($filetmp,$destinationfile);
	}
		
	$result = mysqli_query($con,"INSERT INTO faculty (name,father_name,email,phone,address,date_of_birth,joining_date,job_title,password,salary,subject_id,image) values('$facultyname','$fathernames','$email','$phonenumber','$address','$dateofbirth','$joiningdate','$jobtitle','$password','$salary','$subject','$destinationfile')");
	if($result)
	{
		$_SESSION["Faculty_infoadd"]="Information Insert Sucessfully";
		header("location:faculty.php");
	}
	else
	{
		$_SESSION["Faculty_infoadd"]="Information Insert To Fail";
		header("location:faculty.php");
	}
}else if(isset($_POST["update"]))
	{ 
	$facultyid = $_POST["sid"];
	$facultyname = $_POST["name"];
	$fathernames = $_POST["fname"];
	$email = $_POST["email"];
	$phonenumber = $_POST["phone"];
	$address = $_POST["address"];
	$dateofbirth = $_POST["dob"];
	$joiningdate = $_POST["jd"];
	$jobtitle = $_POST["jobtitle"];	
	$salary = $_POST["salary"];
	$subject = $_POST["subject"];
	$image="";
	if(!empty($_FILES['file-input']['name'])){
		$files=$_FILES['file-input']['name'];
		move_uploaded_file($_FILES['file-input']['tmp_name'],"images/faculty/".$files);
		$image=",image='"."images/faculty/".$files."'";
		
	}
	$password = "";
	if(!empty($_POST["password"])){
		$password =",password='".$_POST["password"]."'";		
	}	
		
	$result = mysqli_query($con,"UPDATE faculty SET name='$facultyname', email='$email', father_name='$fathernames', phone='$phonenumber', address='$address',date_of_birth='$dateofbirth',job_title='$jobtitle'$password,salary='$salary',subject_id='$subject'$image WHERE id='$facultyid'");

		if($result)
		{
			$_SESSION["Faculty_infoadd"]="Information Update Sucessfully";
			header("location:Veiw-Faculty.php");
		}
		else
		{
			$_SESSION["Faculty_infoadd"]="Information Update To Fail";
			header("location:Veiw-Faculty.php");
		}
	
	}
else
{   
	$_SESSION["empty_field"]="Please! Fill All Fields";
	header("location:faculty.php");
}
	
?>
