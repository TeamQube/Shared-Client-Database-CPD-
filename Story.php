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
                        <h1><a href="Story.php" >Add Story</a></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="Story.php" >Story</a></li>
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
                                                        <strong>Add</strong> Story
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="Story-db.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Story Title</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Enter Story Title" value="<?php echo $storytitle; ?>" class="form-control"><small class="form-text text-muted">Enter Title</small></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Story Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea style="min-height:150px;" id="description" name="description" placeholder="Description" value="" class="form-control"><?php echo $storydescription; ?></textarea><small class="help-block form-text">Enter Story Description</small></div>
                                                            </div>      
                                                           
                                                            
                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Story Image</label></div>
                                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
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
   
        
                  
<?php include("footer.php"); }?>