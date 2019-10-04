<?php
session_start();
if(!isset($_SESSION["stdname"]))
{header("location:login.php");}
else{include("studentheader.php"); ?>


    <div class="container-fluid text-center p-5 about-header">
        <h1>Project</h1>
        <hr style="width: 5%;"/>
    </div>
    <!--About Us Starts-->
    <!-- Section: Blog v.3 -->
    <div class="container">
        
		<section class="my-3">
          <?php		
			 $result = mysqli_query($con,"Select * from stdapplyforjob order by id desc"); 
			 foreach($result as $industry)
			  {   
			  if($industry['assign'] == 1){
			      if($_SESSION["stdname"]['id'] == $industry['name']){?>
		  <div class="row">
			<div class="col-lg-5 col-xl-4">
			  <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
				<img class="img-fluid w-75" src="<?php if($industry['industry'] == "")
														{ 
															$intern = $industry['internship'];
															$intresult=mysqli_query($con,"select * from internships where title ='$intern'");
															foreach($intresult as $intpost)
															{
																echo $intpost['image'];
															}
														} else
														{
															$ind = $industry['industry'];
															$intresult=mysqli_query($con,"select * from industryproject where title ='$ind'");
															foreach($intresult as $intpost)
															{
																echo $intpost['image'];
																
															}
															
														} ?>" alt="Sample image" style="max-height: 200px">
				<a>
				  <div class="mask rgba-white-slight"></div>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-7 col-xl-8">
			  <h3 class="font-weight-bold mb-3"><?php if($industry['industry'] == ""){ echo "Internship";} else {echo "Industry Project";} ?>
													<strong><br><?php if($industry['industry'] == "")
														{ 
															$intern = $industry['internship'];
															$intresult=mysqli_query($con,"select * from internships where title ='$intern'");
															foreach($intresult as $intpost)
															{
																echo $intpost['title'];
															}
														} else
														{
															$ind = $industry['industry'];
															$intresult=mysqli_query($con,"select * from industryproject where title ='$ind'");
															foreach($intresult as $intpost)
															{
																echo $intpost['title'];
																
															}
															
														} ?></strong></h3>
			  <p class="dark-grey-text"><?php if($industry['industry'] == "")
														{ 
															$intern = $industry['internship'];
															$intresult=mysqli_query($con,"select * from internships where title ='$intern'");
															foreach($intresult as $intpost)
															{
																echo $intpost['description'];
															}
														} else
														{
															$ind = $industry['industry'];
															$intresult=mysqli_query($con,"select * from industryproject where title ='$ind'");
															foreach($intresult as $intpost)
															{
																echo $intpost['description'];
																
															}
															
														} ?></p>
			  <!-- Post data -->
			  <p>Assign by <a class="font-weight-bold"><?php $fid = $industry['facutlyid'];
														   $fresult =mysqli_query($con,"select * from faculty where id ='$fid'");
															foreach($fresult as $fpost)
															{
																echo $fpost['name'];
																
															} ?></a></p>
			  
			  
			</div>
		</div>

           <hr class="my-5">
          <?php } } }   ?>

		</section>
	</div>








<?php include("footer.php"); }?>