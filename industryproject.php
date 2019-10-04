<?php include("frontendheader.php"); ?>

    <div class="container-fluid text-center p-5 about-header">
        <h1>Industry Project</h1>
        <hr style="width: 5%;"/>
    </div>
    <!--About Us Starts-->
    <!-- Section: Blog v.3 -->
    <div class="container">
        
		<section class="my-3">
          <?php		
			 $result = mysqli_query($con,"Select * from industryproject order by id desc"); 
			 foreach($result as $industry)
			  {   ?>
		  <div class="row">
			<div class="col-lg-5 col-xl-4">
			  <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
				<img class="img-fluid w-75" src="<?php echo $industry['image']; ?>" alt="Sample image" style="max-height: 200px">
				<a>
				  <div class="mask rgba-white-slight"></div>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-7 col-xl-8">
			  <h3 class="font-weight-bold mb-3"><strong><?php echo $industry['title']; ?></strong></h3>
			  <p class="dark-grey-text"><?php echo $industry['description']; ?></p>
			  <!-- Post data -->
			  <p>Post by <a class="font-weight-bold">  
			  <?php 
			   $results = mysqli_query($con,"Select * from employee where id =".$industry['emp_id']); 
			   foreach($results as $emp)
			  {   echo $emp['username']; ?> </a>from</p><?php $emp['cname']; }?>
			  <!-- Read more button -->
			  <a class="btn btn-md" data-toggle="modal" data-target="#myModal_<?php echo $industry['id']; ?>" >Apply Online</a>
			  
			</div>
		</div>
		  
  		<!-- Modal -->
			  <div class="modal fade" id="myModal_<?php echo $industry['id']; ?>" role="dialog">
				<div class="modal-dialog">

				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <h4 class="modal-title">Apply For This Project</h4>
					</div>
						  <form action="industryproject.php" method="post" class="my-4">
						  
							<div class="row">
							    <div class="col-lg-2 mx-2 ml-5">
							    	<label>Username</label>
							    </div>
								<div class="col-lg-7 mx-2">
									<input type="text" class="form-control" name="name" placeholder="First Name" required="true" autocomplete="off">
								</div>
		                    </div><br>
							<div class="row">
							    <div class="col-lg-2 mx-2 ml-5">
							    	<label>Password</label>
							    </div>
								<div class="col-lg-7 mx-2">
									<input type="password" class="form-control" name="password" placeholder="Password" required="true" autocomplete="off">
								</div>
		                    </div><br>
                           	<div class="row">
							    <div class="col-lg-2 mx-2 ml-5">
							    	<label>Job Name</label>
							    </div>
								<div class="col-lg-7 mx-2">
									<input type="text" class="form-control" name="job" readonly value="<?php echo $industry['title']; ?>" placeholder="Project Title" required="true" autocomplete="off">
									
								</div>
		                    </div>
                             
                            <div class="row mt-3">
                             <div class="col-lg-5">
							</div>
                              <div class="col-lg-2">
                                <input type="hidden" name="internshipid" value="<?php echo $industry['id']; ?>">
							    <input type="submit" name="sub" class="btn px-4 pt-1" value="Send">
							  </div>
							</div>
						</form>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>
               <!-- Modal content-->
				</div>
			  </div>
			 
           <hr class="my-5">
          <?php  }   ?>

		</section>
	</div>
<!-- Section: Blog v.3 -->
    <!--About Us End-->
    <?php 
    if(isset($_POST["sub"]))
	{
		    
    		$username = $_POST["name"];
    		$password = $_POST["password"];
		    $job = $_POST["job"];
			$qurey="select * from student where name='$username' and password='$password'";
			$result=mysqli_query($con,$qurey);
				if(mysqli_num_rows($result))
				{
				foreach($result as $data);	
					 
						$name = $data['id'];
				$result = mysqli_query($con,"INSERT INTO stdapplyforjob(name,industry) values('$name','$job')");
                echo '<script language="javascript">';
				echo 'alert("Request Send successfully")';
				echo '</script>';
				
				}	
				else
				{
				echo '<script language="javascript">';
				echo 'alert("Try Again")';
				echo '</script>';
				
				}
		
	}
 include("frontendfooter.php"); ?>