<?php
include("connection.php");
?>

<!doctype html>

<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Center Of Professional Development</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  
<style> 
.item-container {
    float: left;
    width: 369px;
    height: 80px;
    border-radius: 5px;
    border:1px solid transparent;
    background-color: white;
    color: black;
    margin-bottom: 10px;
    overflow: hidden;
    position:relative;
}

    .item-container:hover {
        border: 1px solid rgba(33, 102, 185,1);
    }

    .item-container > img {
        width: 75px;
        height: 80px;
        margin-right: 10px;
        float: left;
        object-fit: cover;
    }

    .item-container > h4 {
        height: auto;
        color: #ff4f05;
        padding: 5px;
        font-weight: bold;
        margin: 0;
        color: inherit;
    }

    .item-container > p {
        height: auto;
        color: #ff4f05;
        margin: 0;
        color: inherit;
    }
	
</style> 
</head>

<body>
 <aside id="left-panel" class="left-panel" >
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="admin-index.php">
                	<h1 class="display-4 text-white" style="font-size: 22px;">C<b>PD</b> Admin</h1>
                </a>
                <a class="navbar-brand hidden" href="admin-index.php">
                    <h1 class="display-4 text-white" style="font-size: 22px; margin-left: -16px;">C<b>PD</b></h1></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                   <li class="active">
                        <a href="admin-index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Report Section</h3>
                    <li>
                        <a href="contactrequest.php"> <i class="menu-icon ti-hand-point-right"></i>Contact Request</a>
                    </li>
                    <li>
                        <a href="stdapplyforjob.php"> <i class="menu-icon ti-hand-point-right"></i>Student Who Apply Online</a>
                    </li>
                    <li>
                        <a href="addprojectstudent.php"> <i class="menu-icon ti-hand-point-right"></i>Add Project To Student</a>
                    </li>
                   <h3 class="menu-title">Add</h3>
                    
                    
                    <li>
                        <a href="Student.php"> <i class="menu-icon ti-hand-point-right"></i>Add Student</a>
                    </li>
                    <li>
                        <a href="Session.php"> <i class="menu-icon ti-hand-point-right"></i>Add Session</a>
                    </li>
                    <li>
                        <a href="Faculty.php"> <i class="menu-icon ti-hand-point-right"></i>Add Faculty</a>
                    </li>
                    <li>
                        <a href="Staff.php"> <i class="menu-icon ti-hand-point-right"></i>Add Staff</a>
                    </li>
                    <li>
                        <a href="Subject.php"> <i class="menu-icon ti-hand-point-right"></i>Add Subject</a>
                    </li>
                    <li>
                        <a href="Course.php"> <i class="menu-icon ti-hand-point-right"></i>Add Courses</a>
                    </li>
                    <!--li>
                        <a href="Story.php"> <i class="menu-icon ti-hand-point-right"></i>Add Story</a>
                    </li-->
                    
                    <h3 class="menu-title">Veiw</h3>
                    <li>
                        <a href="Veiw-Student.php"> <i class="menu-icon ti-hand-point-right"></i>View Student</a>
                    </li>
                     
                    <li>
                        <a href="Veiw-Session.php"> <i class="menu-icon ti-hand-point-right"></i>View Session</a>
                    </li>
                    
                     <li>
                        <a href="Veiw-Faculty.php"> <i class="menu-icon ti-hand-point-right"></i>View Faculty</a>
                    </li>
                    
                     <li>
                        <a href="Veiw-Staff.php"> <i class="menu-icon ti-hand-point-right"></i>View Staff</a>
                    </li>
                    
                     <li>
                        <a href="Veiw-Subject.php"> <i class="menu-icon ti-hand-point-right"></i>View Subject</a>
                    </li>
                     <!--li>
                        <a href="Veiw-Story.php"> <i class="menu-icon ti-hand-point-right"></i>View Story</a>
                    </li-->
                    <li>
                        <a href="Veiw-Course.php"> <i class="menu-icon ti-hand-point-right"></i>View Courses</a>
                    </li>
                    
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                 <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                               
                                <input onkeyup="search(this)" class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
								<div id="search_result" style="overflow-y:auto; max-height:500px; margin:0 !important; background-color: #fff; padding: 30px; "> 
														
                                </div>
                                
                            </form>
                            
                        </div>
					 </div>    
                   </div> 
                

                <div class="col-sm-5">                  
                   <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo $_SESSION['facultyname']['image'];?>" alt="<?php echo $_SESSION['facultyname']['name'];?>" height="40px">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>
                            <?php echo $_SESSION['facultyname']['name'];?>
                            </a>
                             
                            
                            <a class="nav-link" href="updatepassword.php"><i class="fa fa-cog"></i> Update Password</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>  
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->