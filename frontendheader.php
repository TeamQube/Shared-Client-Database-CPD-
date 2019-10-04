<?php include("connection.php");

?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CPD | Center For Professional Development</title>
    <!--Bootstrap CSS Link-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Styles CSS Link-->
    <link rel="stylesheet" href="css/style.css">
    <!--Font Awesome Link-->
    <link rel="stylesheet" href="css/all.min.css">
     <link rel="stylesheet" href="css/owl-carousel.css">
</head>
<style>
	
#owl-demo .item{
  margin: 3px;
}
#owl-demo .item img{
  display: block;
  width: 100%;
  height: auto;
}
</style>
<body>
    <!--Header Start-->
    <header >
    <!--Header Top-->
    <div class="w-100" >
    <div class="container border-bottom" >      
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"><img src="images/logo.jpeg" width="100" height="50"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    
                    <li class="nav-item mt-1">
                        <a class="nav-link t" href="student-login.php">Student</a>
                    </li>
                    <li class="nav-item mt-1">
                        <a class="nav-link " href="faculty-login.php">Faculty</a>
                    </li>
                    <li class="nav-item mt-1">
                        <a class="nav-link " href="employee-login.php">Employer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  mt-1" href="">|</a>
                    </li>
                    <li class="nav-item dropdown" style="margin-top:-4px;">
                        <a class="nav-link dropdown-toggle mt-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mobile App
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="" title="Apple"><img src="images/apple.png" width="25" height="23" title="Apple" class="ml-3 mr-2">IOS</a>
                            <a class="nav-link" href="" title="Android"><img src="images/android.png" width="25" height="23" title="Android" class="ml-3 mr-2"> Android</a>
                        </div>
                    </li>
                    <li class="nav-item mt-1" style="margin-top:-4px;">
                        <a class="nav-link " href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>
                    <li class="nav-item dropdown" style="margin-top:-4px;">
                        <a class="nav-link dropdown-toggle  mt-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Language
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="" ><img src="images/flag/japaness flag.png" width="25" height="23"  title="Japaness" class="mx-5"></a>
                            <a class="nav-link" href="" ><img src="images/flag/usa flag.jpg" width="25" height="23"  title="USA" class="mx-5"></a>
                            <a class="nav-link" href="" ><img src="images/flag/vietnam flag.png" width="25" height="23"  title="Vietnam" class="mx-5"></a>
                            <a class="nav-link" href="" ><img src="images/flag/india flag.png" width="25" height="23"  title="Hindi" class="mx-5"></a>
                            
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
    </div>
    <!--Header Top End-->
    
    <!--Navbar-->
    <div class="w-100">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                     <li class="nav-item mr-md-5  pr-md-2 mt-2">
                        <a class="nav-link " href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown mr-md-5 pr-md-2">
                        <a class="nav-link dropdown-toggle  mt-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Courses
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Higher Education</a>
                            <a class="dropdown-item" href="#">Professional Year</a>
                        </div>
                    </li>
                    <li class="nav-item mr-md-5 pr-md-2 mt-2">
                        <a class="nav-link " href="internship.php">Internships</a>
                    </li>
                    <li class="nav-item mr-md-5  pr-md-2 mt-2">
                        <a class="nav-link " href="industryproject.php">Industry Project</a>
                    </li>
                    <li class="nav-item mr-md-5  pr-md-2 mt-2">
                        <a class="nav-link " href="#">Current Jobs</a>
                    </li>
                    <li class="nav-item mr-md-5 pr-md-2 mt-2">
                        <a class="nav-link " href="#">News</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </div>
    </div>
    <!--Navabar End-->
    </header>
    
    
