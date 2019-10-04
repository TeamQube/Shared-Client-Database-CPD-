<?php  
session_start();
if(isset($_SESSION['username'])){
	header("location:admin-index.php");
}

include("frontendheader.php"); ?>

<div class="container contact">
	                 <h1 class="text-center mt-5 mb-4">Admin Login</h1>
                    <form action="login-db.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <input type="text" class="form-control" name="adminname" placeholder="User Name" required="true" autocomplete="off">
                            </div>
                     
                            <div class="col-lg-6 offset-lg-3">
                                <input type="password" class="form-control" name="adminpassword" placeholder="Password" required="true" title="Enter In Capital Form For Example:DOE">
                            </div>
                            
                            <div class="col-lg-6 offset-lg-3">
                            	<input type="submit" name="adminbtn" class="btn" value="Login">
                           </div>

                        </div>
                          
                    </form> 
                    
</div>

 <?php include("frontendfooter.php"); ?>