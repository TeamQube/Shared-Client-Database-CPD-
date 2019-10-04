<?php
include("connection.php");
session_start();
if(!isset($_SESSION["stdname"]) and !isset($_SESSION["facultyname"]) and !isset($_SESSION["emp"]))
{header("location:index.php");}
else { 
	if(isset($_SESSION["stdname"])) { include("studentheader.php"); } elseif(isset($_SESSION["emp"])) { include("employeeheader.php"); }else
{ include("header.php");} ?>
 
       
						<div class="breadcrumbs">
							<div class="col-sm-4">
								<div class="page-header float-left">
									<div class="page-title">
										<h1><a href="updatepassword.php" >update</a></h1>
									</div>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="page-header float-right">
									<div class="page-title">
										<ol class="breadcrumb text-right">
											<li class="active"><a href="updatepassword.php" >Update Password</a></li>
										</ol>
									</div>
								</div>
							</div>
						</div>  
              
			<?php if(isset($_SESSION["password"]) || isset($_SESSION["matchpassword"]) || isset($_SESSION["oldpassword"]) || isset($_SESSION["required"])){?>
			<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
					<span class="badge badge-pill badge-danger">Error</span>
					<?php echo @$_SESSION["password"];unset($_SESSION["password"])?>
					<?php echo @$_SESSION["matchpassword"];unset($_SESSION["matchpassword"])?>
					<?php echo @$_SESSION["oldpassword"];unset($_SESSION["oldpassword"])?>
					<?php echo @$_SESSION["required"];unset($_SESSION["required"])?>
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
					 </button>
				</div>
				<?php }?>
               <div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong>Update</strong> Password
					</div>
					<div class="card-body card-block">
						<form action="updatepassword-db.php" method="post" enctype="multipart/form-data" class="form-horizontal">

							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Old Password</label></div>
								<div class="col-12 col-md-9"><input type="password" id="oldpass" name="oldpass" placeholder="Enter Old Password"  class="form-control"><small class="form-text text-muted">Enter Old Password</small></div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">New Password</label></div>
								<div class="col-12 col-md-9"><input type="password" id="newpass" name="newpass" placeholder="Enter New Password"  class="form-control"><small class="form-text text-muted">Enter New Password</small></div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Confirm Password</label></div>
								<div class="col-12 col-md-9"><input type="password" id="confirmpass" name="confirmpass" placeholder="Enter Confirm Password"  class="form-control"><small class="form-text text-muted">Enter Confirm Passworde</small></div>
							</div>
							
							</div>
							
						    <div class="card-footer d-flex justify-content-center ">
							 <input type="submit" class="col-4 btn btn-success btn-lg btn-block" name ="update" value="Update">
							</div>
							
							</div>
							</form>
      
        
        
<?php include("footer.php");} ?>
