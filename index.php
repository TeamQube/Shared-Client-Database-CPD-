<?php include("frontendheader.php"); ?>
    <!--Header Ends-->
    
    <!--Carousel Start-->
    <section id="slider ">
         <div class="container-fluid" style="padding:0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              
            </ol>
            <div class="carousel-inner" style="max-height: 90vh">
                <div class="carousel-item active">
                    <img class="d-block img-fluid w-100" style="height: 90vh" src="img/slide (1).jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid w-100" style="height: 90vh" src="img/slide (2).jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid w-100" style="height: 90vh" src="img/slide (3).jpeg" alt="Third slide">
                </div>
               
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
    </section>
    <!--Carousel End-->
    <!--Search Bar Start-->
    
    <!--Search Bar End-->
    <!--Stories Start-->
   <section class="stories mt-5">
    <div class="container">
        <h1 class="mb-4">Success Story</h1>
        <div class="row">
        <div class="col-md-10">  
         
           <div id="owl-testimonials" class="owl-carousel owl-theme">
              
           	 <?php 
						
				$result = mysqli_query($con,"Select * from story order by id desc"); 
			   foreach($result as $storydetail)
					      { ?>	
				<div class="item text-center" >
					<div class="testimonials-item mx-1 bg-light my-3"    style="border: 1px solid #dee2e6;  border-radius: 50px 20px;box-shadow: 0 8px 6px -6px black;">
						<div class="view overlay ">
							<img class="card-img-top pt-3 px-3" src="<?php echo $storydetail['story_image']; ?>" alt="Card image cap" style=" border-radius:60%;max-height:220px;" >
							
						  </div>
						<div class="text-content pr-4 pl-4 pt-4 bg-light" style="min-height:220px;">
							<div class="row mt-3">
								<h4 class="card-title ml-3" style="text-align: left;" ><?php echo $storydetail['story_title']; ?></h4><i class="fas fa-share-alt white-text mt-2" style="position:relative;left:90px;"></i>
 							</div>
							<hr class="hr-light">
							<p class="card-text white-text mb-4 text-justify"><?php echo $storydetail['story_description']; ?></p>
						</div>
					   <div class="my-3">
						<hr class="hr-light w-75">
						<a class="px-2 fa-lg li-ic" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
						<!-- Twitter -->
						<a class="px-2 fa-lg tw-ic" title="Twitter"><i class="fab fa-twitter"></i></a>
						<!-- Dribbble -->
						<a class="px-2 fa-lg fb-ic" title="Facebook"><i class="fab fa-facebook-f"></i></a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
     <div class="col-md-2">
       <h1 style="text-align: center;">Poll stats</h1>
        <br>
		<a href="#"><h5 style="text-align: center;">Voting Poll</h5></a>
        <a href="#"><h5 style="text-align: center;">Survey Poll</h5></a>
    </div>
    </div>
    </div>
    </section>

 
    <!--Polls Start-->
        
    <!--Polls End-->
    <!--Footer Started-->
   <?php include("frontendfooter.php"); ?>