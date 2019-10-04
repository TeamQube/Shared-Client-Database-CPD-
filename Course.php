<?php
include("connection.php");
if(isset($_GET["id"]) and !empty($_GET["id"]))
{
	$result = mysqli_query($con,"select * from course WHERE id=".$_GET["id"]);
	foreach($result as $row);
	$courseid = $row["id"];
	$name = $row["name"];
	$subject = $row["subject"];
}
else{
	$courseid = "";
	$name = "";
	$subject = "";
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
										<h1><a href="Course.php" >Course</a></h1>
									</div>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="page-header float-right">
									<div class="page-title">
										<ol class="breadcrumb text-right">
											<li class="active"><a href="Session.php" >Course</a></li>
										</ol>
									</div>
								</div>
							</div>
						</div>  
               <?php if(isset($_SESSION["Course_infoadd"])){?>
		  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
							<span class="badge badge-pill badge-success">Success</span>
							<?php echo @$_SESSION["Course_infoadd"];unset($_SESSION["Course_infoadd"])?>
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
						<strong>Course</strong> Information
					</div>
					<div class="card-body card-block">
						<form action="Course-db.php" method="post" enctype="multipart/form-data" class="form-horizontal">

							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
								<div class="col-12 col-md-9"><input type="text" id="coursename" name="coursename" value="<?php echo $name; ?>" placeholder="Course Name" class="form-control"><small class="form-text text-muted">Enter Course Name</small></div>
							</div>
							    
							<div class="row form-group">
							<div class="col col-md-3"><label for="select" class=" form-control-label">Subject</label></div>
							<div class="col-12 col-md-9">
								<select size="10" multiple id="subject" name="subject[]" class="form-control">
									<option value="">Please select Subject</option>
								   <?php $result=mysqli_query($con,"select * from subject");
										while($crow=mysqli_fetch_assoc($result)){
										?>
										<option <?php if($subject==$crow['id']){ echo"selected";}?>  value="<?php echo $crow['id']?>"><?php echo $crow['name']?></option>
									<?php }?>
								</select>
								<small class="help-block form-text">Enter Subject</small>
							</div>
					 		</div>
							
							</div>
							<?php if(isset($_GET["id"]) and !empty($_GET["id"])) 
							{?>
							<input type="hidden" id="sid" name="sid" value="<?php echo $courseid; ?>">
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

