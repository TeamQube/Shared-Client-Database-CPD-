<?php 
session_start();

if(isset($_SESSION['facultyname'])){
	header("location:admin-index.php?id=".$_SESSION['facultyname']['id']);
}
include("frontendheader.php");
?>

<div class="container contact">
	                <h1 class="text-center mt-5 mb-4">Faculty Login</h1>
                     <?php if(isset($_SESSION["error"])){?>
						<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
								<span class="badge badge-pill badge-danger">Error</span>
								<?php echo @$_SESSION["error"];unset($_SESSION["error"])?>
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								   <span aria-hidden="true">&times;</span>
								 </button>
						</div>
				    <?php }?>
                    <form action="login-db.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <input type="text" class="form-control" name="staffname" placeholder="User Name" required="true"  autocomplete="off">
                            </div>
                     
                            <div class="col-lg-6 offset-lg-3">
                                <input type="password" class="form-control" name="staffpassword" placeholder="Password" required="true" title="Enter In Capital Form For Example:DOE">
                            </div>
							<div class="col-lg-6 offset-lg-3">
							<input type="submit" name="facultybtn" class="btn" value="Login"><a href="Registration.php" style="margin-left: 400px; color: #941517">Sign up</a>
							</div>   
                        </div>
                          
                    </form> 
                    
</div>

 <?php include("frontendfooter.php"); ?>