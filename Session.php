<?php
include("connection.php");
if(isset($_GET["id"]) and !empty($_GET["id"]))
{
	$result = mysqli_query($con,"select * from session WHERE id=".$_GET["id"]);
	foreach($result as $row);
	$sessionid = $row["id"];
	$time = $row["time"];
	$course = $row["course_id"];
	$startingdate = $row["starting_date"];
	$endingdate = $row["ending_date"];
}
else{
	$sessionid = "";
	$time = "";
	$course = "";
	$startingdate = "";
	$endingdate = "";
	
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
              <?php if(isset($_SESSION["Session_add_msg"])){?>
			  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
								<span class="badge badge-pill badge-success">Success</span>
								<?php echo @$_SESSION["Session_add_msg"];unset($_SESSION["Session_add_msg"])?>
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
						<form action="Session-db.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            
                            <div class="row form-group">
							<div class="col col-md-3"><label for="select" class=" form-control-label">Course</label></div>
							<div class="col-12 col-md-9">
								<select id="scourse" onChange="window.location.href='?appendname='+this.value+'<?php if(isset($_GET['id'])){ echo '&id='.$_GET['id'];} ?>'" name="scourse" class="form-control">
										<option value="">Please select Course</option>
									   <?php $result=mysqli_query($con,"select * from course");
											while($crow=mysqli_fetch_assoc($result)){
											?>
										<option <?php if(isset($_GET['appendname']) and $_GET['appendname']==$crow['id'] ){ echo"selected";}?> value="<?php echo $crow['id']?>"><?php echo $crow['name']?></option>
										<?php }?>
								</select>
								<small class="help-block form-text">Enter Subject</small>
							</div>
					 		</div>
                  
							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Subject Timing</label></div>
								<div class="col-12 col-md-9">
								<textarea id="subjectnames" style="float: left; min-height:150px; width:150px;" readonly class="form-control"><?php
									
									
									if(isset($_GET['appendname'])){
										$getname=$_GET['appendname'];
									}
									
									

									if(isset($getname)){
										
											$result=mysqli_query($con,"select * from course where id=".$getname);
											while($crow=mysqli_fetch_assoc($result)){

												$subresult=mysqli_query($con,"select * from subject where id IN(".$crow['subject'].")");
												while($subcrow=mysqli_fetch_assoc($subresult)){
													echo $subcrow['name'].'&#10;';
												} 
											} 
										
									}
									?></textarea>
								<textarea  style="float: left; min-height:150px; width:calc(100% - 150px);" id="sessiontime" name="sessiontime" placeholder="Enter Date And Time" class="form-control"><?php
									if(isset($_GET['id']) and !empty($_GET['id']) ){
										echo $time; 
									}
	                                 
									?></textarea><small class="form-text text-muted">Enter Date time</small></div>
							</div>
							
							
							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Starting Date</label></div>
								<div class="col-12 col-md-9"><input type="date" id="startingdate" name="startingdate"  value="<?php echo $startingdate; ?>" class="form-control"><small class="form-text text-muted">Enter Date time</small></div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Ending Date</label></div>
								<div class="col-12 col-md-9"><input type="date" id="endingdate" name="endingdate"  value="<?php echo $endingdate; ?>" class="form-control"><small class="form-text text-muted">Enter Date time</small></div>
							</div> 
						
							
							
							</div>
							<?php if(isset($_GET["id"]) and !empty($_GET["id"])) 
											{?>
							<input type="hidden" id="sid" name="sid" value="<?php echo $sessionid; ?>">
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
      
        
					   <script>

						var str = document.getElementById('subjectnames').innerHTML;
						var temp = new Array();
						temp = str.toString().split("\n");
						 var i = 0;
						 document.getElementById('sessiontime').onkeydown=function(e)
						 { 
							   if (e.keyCode > 31 && (e.keyCode < 48 || e.keyCode > 57) && e.keyCode != 186) 
							   {
								   	alert("Enter Time Only In Number!");
									 return false; 
							    }
							    else
								{
								 if(e.keyCode==13)
										{
										  var prevalue = document.getElementById('sessiontime');
										  prevalue.value = prevalue.value+"am"+" "+temp[i]+",";
										  i++
										}
									
								}
						 }

					   </script>       
<?php include("footer.php");} ?>