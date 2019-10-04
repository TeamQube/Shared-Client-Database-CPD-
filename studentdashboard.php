<?php
session_start();
if(!isset($_SESSION["stdname"]))
{header("location:login.php");}
else{include("studentheader.php"); ?>
 
  

   <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Veiw Student</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="studentdashboard.php">Veiw Student</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
       <?php if(isset($_SESSION["password"])){?>
			  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
								<span class="badge badge-pill badge-success">Success</span>
								<?php echo @$_SESSION["password"];unset($_SESSION["password"])?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
								</button>
			  </div>
			  <?php }?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                
                
                 <div class="col-12">
                 	<div class="card-group">
                 	 <?php $result=mysqli_query($con,"select * from student where id=".$_SESSION["stdname"]['id']);
						while($row=mysqli_fetch_assoc($result)){?>
                 		<div class="card m-2">
                 			<div class="card-header">
								<strong class="card-title mb-3">Profile</strong>
							</div>
							<div class="card-body">
								<div class="mx-auto d-block">
									<img class="rounded-circle mx-auto d-block" src="<?php echo $row['image']?>" alt="Card image cap" >
									<h5 class="text-sm-center mt-2 mb-1"><?php echo $row['name']?></h5>
									<div class="location text-sm-center"><i class="fa fa-map-marker"></i> <?php echo $row['address']?></div>
								</div>
								<hr>
								<div class="card-text text-sm-center">
									<a href="#"><i class="fa fa-facebook pr-1"></i></a>
									<a href="#"><i class="fa fa-twitter pr-1"></i></a>
									<a href="#"><i class="fa fa-linkedin pr-1"></i></a>
								</div>
							</div>
                 		</div>
                 		<div class="card m-2">
                 		    <div class="card-header">
								<strong class="card-title mb-3">Bio Data</strong>
							</div>
                 			<div class="card-block mt-3">
                 				
                 				<p style="margin-left: 10px;margin-top:10px; "><b>Father Name : </b><?php echo $row['father_name'];?></p>
                 				<p style="margin-left: 10px;"><b>Email :</b> <?php echo $row['email'];?></p>
                 				<p style="margin-left: 10px;"><b>Phone :</b> <?php echo $row['phone'];?></p>
                 				<p style="margin-left: 10px;"><b>Address :</b> <?php echo $row['address'];?></p>
                 				<p style="margin-left: 10px;"><b>Date Of Birth :</b> <?php echo $row['date_of_birth'];?></p>
                 				
                 			</div>
                 		</div>
                 		<div class="card m-2">
                 		  <div class="card-header">
								<strong class="card-title mb-3">Schedule</strong>
						  </div>
                 			<div class="card-block">
                 			
								<table class="table">
               			
                			<tr>
									<th>Subject</th>
									
               						<th>Timing</th>
               						<th>Teacher</th>
                			</tr>
                		
                 			<?php
										$session=mysqli_query($con,"SELECT * FROM session");
										foreach($session as $sessionrow){
											$couse=mysqli_query($con,"SELECT * FROM course where id=".$sessionrow['course_id']);
											foreach($couse as $couserow){
												$subject=mysqli_query($con,"SELECT * FROM subject where id IN(".$couserow['subject'].")");
												$index=0;
												foreach($subject as $subjectrow){
													if($sessionrow['id']==$_SESSION["stdname"]['session_id']){
													    echo"<tr>";
														echo "<td>".$subjectrow['name']."</td>";
														$splittime = explode(',',$sessionrow['time']);
														echo  "<td>";
														for($i = 0;$i<count($splittime);$i++)
														  {
															if(strstr($splittime[$i],$subjectrow['name']))
															{
																$splitfromam = explode('am',$splittime[$i]);
																echo $splitfromam[0];
																if(empty($splitfromam[0]))
																{
																	echo "please Set Time!";
																}
															}
														  }
														 echo "</td>";
														$teachername="<td>";
														
														$teacher=mysqli_query($con,"SELECT * FROM faculty where subject_id=".$subjectrow['id']);
														foreach($teacher as $teacherrow){
															
															$teachername.=$teacherrow['name']."<br>";
															
														}	
														$teachername.="</td>";
														echo $teachername;
														echo"</tr>";
														$index++;
													}
												}	

											}	
								
										}						
																
						?>
                			
                			</table>
                 			</div>
                 		</div>
                 		
                 		<?php }?>
                 	</div>
                 </div>
                   
                 
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div>
 
 
 
 <?php include("footer.php"); }?>
