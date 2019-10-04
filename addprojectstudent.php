<?php
include("connection.php");
if(isset($_GET["id"]) and !empty($_GET["id"]))
{
	$result = mysqli_query($con,"select * from story WHERE id=".$_GET["id"]);
	foreach($result as $row);
	$storyid = $row["id"];
	$storytitle = $row["story_title"];
	$storydescription = $row["story_description"];
	$image = $row["story_image"];	
}
else{
	$storyid = "";
	$storytitle = "";
	$storydescription = "";
	
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
                        <h1><a href="addprojectstudent.php" >Assign Project</a></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="addprojectstudent.php" >Assign Project</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>     
          <?php if(isset($_SESSION["Staff_infoadd"])){?>
		  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
							<span class="badge badge-pill badge-success">Success</span>
							<?php echo @$_SESSION["Staff_infoadd"];unset($_SESSION["Staff_infoadd"])?>
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
                                                        <strong>Assign</strong> Project
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="addprojectstudent-db.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                            
                                                            
                                                              <div class="row form-group">
                                                                 <div class="col col-md-3"><label for="select" class=" form-control-label">Student</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select id="" name="studentid" class="form-control">
                                                                                <option value="">Please select Student</option>
                                                                           <?php $result=mysqli_query($con,"select * from student");
																				while($srow=mysqli_fetch_assoc($result)){
																				?>
																				<option  value="<?php echo $srow['id']?>"><?php echo $srow['name']?></option>
																			<?php }?>
                                                                        </select>
                                                                        <small class="help-block form-text">Enter Session</small>
                                                                    </div>
                                                                    
                                                             </div>
                                                             
                                                              <div class="row form-group">
                                                               <div class="col col-md-3"><label for="select" class=" form-control-label">Select Project Type</label></div>
                                                                <div class="col-12 col-md-9">
																	 
																	 <label><input type="checkbox" class="internship">Internship</label><br>
																	 <label><input type="checkbox" class="industry">Industry Based Project</label><br>
															   </div>
                                                             </div>
                                                             
                                                              <div class="row form-group">
                                                                 <div class="col col-md-3"><label for="select" class=" form-control-label">Internship</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select id="internship" name="internship" class="form-control">
                                                                                <option value="">Please select Internship</option>
																				   <?php $intresult=mysqli_query($con,"select * from internships");
																						while($introw=mysqli_fetch_assoc($intresult)){
																						?>
																						<option value="<?php echo $introw['title']?>"><?php echo $introw['title']?></option>
																					<?php }?>
                                                                        </select>
                                                                        <small class="help-block form-text">Select Internship</small>
                                                                    </div>
                                                                    
                                                             </div>
                                                             
                                                              <div class="row form-group">
                                                                 <div class="col col-md-3"><label for="select" class=" form-control-label">Industry Based Project</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select id="industry" name="industry" class="form-control">
                                                                                <option value="">Please select Internship</option>
																				   <?php $intresult=mysqli_query($con,"select * from industryproject");
																						while($introw=mysqli_fetch_assoc($intresult)){
																						?>
																						<option value="<?php echo $introw['title']?>"><?php echo $introw['title']?></option>
																					<?php }?>
                                                                        </select>
                                                                        <small class="help-block form-text">Select Industry Project</small>
                                                                    </div>
                                                                    
                                                             </div>
                                                              
                                                              <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Session</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select id="" name="assign" class="form-control">
                                                                                <option value="">Please Select Assign</option>
																				<option  value="1">Yes</option>
                                                                                <option  value="0">No</option>
                                                                        </select>
                                                                        <small class="help-block form-text">Enter Session</small>
                                                                    </div>
                                                             </div>
                                                             
                                                              
                                                            
                                                           
                                                           	</div>
															<?php if(isset($_GET["id"]) and !empty($_GET["id"])) 
																{?>
																<input type="hidden" id="sid" name="sid" value="<?php echo $storyid; ?>">
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