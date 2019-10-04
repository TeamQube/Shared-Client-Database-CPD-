<?php
include("connection.php");
if(isset($_GET["id"]) and !empty($_GET["id"]))
{
	$result = mysqli_query($con,"select * from faculty WHERE id=".$_GET["id"]);
	foreach($result as $row);
	$facultyid = $row["id"];
	$name = $row["name"];
	$fathername = $row["father_name"];
	$email = $row["email"];
	$phonenumber = $row["phone"];
	$address = $row["address"];	
	$dateofbirth = $row["date_of_birth"];
	$joiningdate = $row["joining_date"];
	$password = $row["password"];
	$jontitle = $row["job_title"];
	$salary = $row["salary"];
	$subject = $row["subject_id"];
	$image = $row["image"];	
}
else{
	$facultyid = "";
	$name = "";
	$fathername = "";
	$email = "";
	$phonenumber = "";
	$address = "";	
	$dateofbirth = "";
	$joiningdate = "";
	$password = "";
	$jontitle = "";
	$salary = "";
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
                        <h1><a href="Faculty.php" >Student</a></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="Faculty.php" >Student</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> 
            
        <?php if(isset($_SESSION["Faculty_infoadd"])){?>
		  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
							<span class="badge badge-pill badge-success">Success</span>
							<?php echo @$_SESSION["Faculty_infoadd"];unset($_SESSION["Faculty_infoadd"])?>
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
                                                        <strong>Faculty</strong> Information
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="Faculty-db.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                        

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Faculty Name" value="<?php echo $name; ?>" class="form-control" ><small class="form-text text-muted">Enter Faculty Name</small></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Father Name</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="fname" name="fname" placeholder="Father Name" value="<?php echo $fathername ?>" class="form-control"><small class="help-block form-text">Enter Father Name</small></div>
                                                            </div>      
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                                                <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" class="form-control"><small class="form-text text-muted">Enter Your Email</small></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Phone Number</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="Phone Number" value="<?php echo $phonenumber; ?>" class="form-control"><small class="help-block form-text">Enter Phone Number</small></div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Address</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="address" name="address" value="<?php echo $address; ?>" placeholder="Address" class="form-control"><small class="help-block form-text">Enter Address</small></div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Subject</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select id="subject" name="subject" class="form-control">
                                                                                <option value="">Please select Subject</option>
                                                                           <?php $result=mysqli_query($con,"select * from subject");
																				while($row=mysqli_fetch_assoc($result)){
																				?>
																				<option <?php if($subject==$row['id']){ echo"selected";}?> value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
																			<?php }?>
                                                                        </select>
                                                                        <small class="help-block form-text">Enter Subject</small>
                                                                    </div>
                                                             </div>
                                                            
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Date Of Birth</label></div>
                                                                <div class="col-12 col-md-9"><input type="date" id="dob" name="dob" placeholder="Date Of Birth" value="<?php echo $dateofbirth; ?>" class="form-control"><small class="help-block form-text">Enter Date Of Birth</small></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Joining Date</label></div>
                                                                <div class="col-12 col-md-9"><input type="date" id="jd" name="jd" placeholder="Joining Date" value="<?php echo $joiningdate; ?>" class="form-control"><small class="help-block form-text">Enter Joining Date</small></div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Password</label></div>
                                                                <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="password"  class="form-control"><small class="help-block form-text">Enter password</small></div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Job Title</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="jobtitle" name="jobtitle" value="<?php echo $jontitle; ?>" placeholder="Job Title" class="form-control"><small class="help-block form-text">Enter Job Title</small></div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Salary</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="salary" name="salary" placeholder="Enter Salary" value="<?php echo $salary; ?>" class="form-control"><small class="help-block form-text">Enter Salary</small></div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Faculty Image</label></div>
                                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"  class="form-control-file"></div>
                                                            </div>
                                                           	</div>
                                                           	  <?php if(isset($_GET["id"]) and !empty($_GET["id"])) 
																				{?>
																<input type="hidden" id="sid" name="sid" value="<?php echo $facultyid; ?>">
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
   
        
                  
<?php include("footer.php"); }?>