<?php 
session_start();
include("connection.php");
include("frontendheader.php"); 
?>

    <div class="container-fluid text-center p-5 about-header">
        <h1 class="text-light">Faculty Sign Up</h1>
        <hr style="width: 5%;"/>
    </div>

    <div class="container contact">
            <div class="row">
                <div class="col-md-4 address">
                    <h1>Reach Us</h1>
                    <p>Email : info@example.com</p>
                    <p>Phone : 02123456789</p>
                    <p>Address : Street 123 City ABC, 12345, Country</p>
                    <p class="social"><a href=""><i class="fab fa-facebook-f"></i></a> <a href="" class="left"><i class="fab fa-twitter"></i></a> <a href="" class="left"><i class="fab fa-instagram"></i></a></p>
                </div>
                <div class="col-md-8">
                    <?php if(isset($_SESSION["Registration_add_msg"])){?>
						  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
								<span class="badge badge-pill badge-success">Success</span>
								<?php echo @$_SESSION["Registration_add_msg"];unset($_SESSION["Registration_add_msg"])?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
								</button>
						  </div>
					<?php }?>
                   <?php if(isset($_SESSION["Registration_add_error"])){?>
						<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
								<span class="badge badge-pill badge-danger">Error</span>
								<?php echo @$_SESSION["Registration_add_error"];unset($_SESSION["Registration_add_error"])?>
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								   <span aria-hidden="true">&times;</span>
								 </button>
						</div>
				 <?php }?>
                    <form action="Registration-db.php" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="name" placeholder="User Name" required="true">
                            </div>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="true">
							</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                
								<select id="subject" name="subject" class="form-control" style="font-size: 15px;" >
										<option value="">Please Select Course</option>
								   <?php $result=mysqli_query($con,"select * from subject");
										while($row=mysqli_fetch_assoc($result)){
										?>
										<option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
									<?php }?>
								</select>
                                                                       
                                                                    
							</div>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true">
                            </div>
                        </div>
                        <input type="submit" name="sub" class="btn" value="sign up">
                    </form>
                    
                </div>
            </div>
        </div>
    <!--Contact Ends-->

    <!--Footer Started-->
    <?php include("frontendfooter.php"); ?>