<?php 
include("connection.php");
if(isset($_GET["id"]) and !empty($_GET["id"]))
{
	$result = mysqli_query($con,"select * from subject WHERE id=".$_GET["id"]);
	foreach($result as $row);
	$staffid = $row["id"];
	$name = $row["name"];
	
}
else{
	$staffid = "";
	$name = "";	
}
session_start();
if(!isset($_SESSION["facultyname"]))
{header("location:faculty-login.php");}
else{
 include("header.php"); ?>
       
						<div class="breadcrumbs">
							<div class="col-sm-4">
								<div class="page-header float-left">
									<div class="page-title">
										<h1><a href="Session.php" >Session</a></h1>
									</div>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="page-header float-right">
									<div class="page-title">
										<ol class="breadcrumb text-right">
											<li class="active"><a href="Session.php" >Session</a></li>
										</ol>
									</div>
								</div>
							</div>
						</div> 
                     
                      <?php if(isset($_SESSION["subject_add_msg"])){?>
                      <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        <?php echo @$_SESSION["subject_add_msg"];unset($_SESSION["subject_add_msg"])?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                        </button>
                      </div>
                      <?php }?>
                      <?php if(isset($_SESSION["empty_field"])){?>
		<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
				<span class="badge badge-pill badge-danger">Error</span>
				<?php echo @$_SESSION["empty_field"];unset($_SESSION["empty_field"])?>
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button>
			</div>
			<?php }?>
                       <div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong>Student</strong> Information
					</div>
					<div class="card-body card-block">
						<form action="Subject-db.php" method="post" enctype="multipart/form-data" class="form-horizontal">

							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Subject Name</label></div>
								<div class="col-12 col-md-9"><input type="text" id="subject" name="subject" value="<?php echo $name; ?>" placeholder="Subject Name" class="form-control"><small class="form-text text-muted">Enter Subject Name</small></div>
							</div>

							</div>
							<?php if(isset($_GET["id"]) and !empty($_GET["id"])) 
							{?>
							<input type="hidden" id="sid" name="sid" value="<?php echo $staffid; ?>">
						   <div class="card-footer d-flex justify-content-center ">
							 <input type="submit" class="col-4 btn btn-success btn-lg btn-block" name ="update" value="Update">
							</div>
							<?php } else {?>
							<div class="card-footer d-flex justify-content-center ">
							<input type="submit" class="col-4 btn btn-success btn-lg btn-block" name ="ssub" value="Submit">
							</div>

							<?php } ?>
							</div>
							</form>
      
        
        
<?php include("footer.php");} ?>

