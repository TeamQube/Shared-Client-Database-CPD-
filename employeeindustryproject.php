<?php
include("connection.php");
if(isset($_GET["id"]) and !empty($_GET["id"]))
{
	$result = mysqli_query($con,"select * from industryproject WHERE id=".$_GET["id"]);
	foreach($result as $row);
	$id = $row["id"];
	$title = $row["title"];
	$description = $row["description"];
	$image = $row["image"];	
}
else{
	$id = "";
	$title = "";
	$description = "";
	
}
session_start();
if(!isset($_SESSION["emp"]))
{header("location:employee-login.php");}
else{include("employeeheader.php"); ?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><a href="employeeindustryproject.php" >Industry Project</a></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="employeeindustryproject.php" >Industry Project</a></li>
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
                                                        <strong>Add</strong>
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="employeeindustryproject-db.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Project Title</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Enter Title" value="<?php echo $title; ?>" class="form-control"><small class="form-text text-muted">Enter Title</small></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Project Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea style="min-height:150px;" id="description" name="description" placeholder="Description" value="" class="form-control"><?php echo $description; ?></textarea><small class="help-block form-text">Enter Description</small></div>
                                                            </div>      
                                                           
                                                            
                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Project Image</label></div>
                                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                                                            </div>
                                                           	</div>
															<?php if(isset($_GET["id"]) and !empty($_GET["id"])) 
																{?>
																<input type="hidden" id="sid" name="sid" value="<?php echo $id; ?>">
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