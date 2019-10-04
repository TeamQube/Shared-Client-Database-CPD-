<?php 
session_start();
include("connection.php");
if(isset($_POST["ssub"]) And !empty($_POST["fname"]) And !empty($_POST["lname"]) And !empty($_POST["phone"]) And !empty($_POST["email"]) And !empty($_POST["message"]))
{	 
	$fname = $_POST["fname"];
	$lnames = $_POST["lname"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$message = $_POST["message"];

	$result = mysqli_query($con,"INSERT INTO contact_us (name,lastname,email,phone,message) values('$fname','$lnames','$phone','$email','$message')");
      
		if($result)
		{
			$_SESSION["infoadd"]="Your Request Submit Successfully";			
		}
		else
		{
			$_SESSION["infoadderror"]="Something went wronge Try Agin Later!";		
		}

 }

include("frontendheader.php"); 


?>

    <div class="container-fluid text-center p-5 about-header">
        <h1 class="text-light">Contact</h1>
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
                   <?php if(isset($_SESSION["infoadd"])){?>
					  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
							<span class="badge badge-pill badge-success">Success</span>
							<?php echo @$_SESSION["infoadd"];unset($_SESSION["infoadd"])?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
							</button>
					  </div>
					  <?php }?>
					<?php if(isset($_SESSION["infoadderror"])){?>
					<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
							<span class="badge badge-pill badge-danger">Error</span>
							<?php echo @$_SESSION["infoadderror"];unset($_SESSION["infoadderror"])?>
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
							 </button>
						</div>
				<?php }?>
                    <form action="contact.php" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="fname" placeholder="First Name" required="true">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name" required="true" title="Enter In Capital Form For Example:DOE">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="phone" placeholder="Phone Number" required="true" title="Enter In Capital Form For Example:JOHN">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="email" placeholder="Email" required="true">
                            </div>
                        </div>
                        <textarea class="form-control" name="message" placeholder="Message" style="resize:none; height: 150px;" required></textarea>
                        <input type="submit" name="ssub" class="btn" value="Send">
                    </form>
                    
                </div>
            </div>
        </div>
    <!--Contact Ends-->

    <!--Footer Started-->
    <?php include("frontendfooter.php"); ?>