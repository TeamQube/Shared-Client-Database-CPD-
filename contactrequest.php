<?php 
session_start();
if(!isset($_SESSION['facultyname']))
{header("location:login.php");}
else{include("header.php"); 
if(isset($_GET["delete-id"]) and !empty($_GET["delete-id"]))
{
		$id=$_GET["delete-id"];
		$query = mysqli_query($con,"DELETE FROM contact_us WHERE id=$id"); 
	
} ?>

	 <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Request</h1>
                    </div>
                </div>
            </div>
             
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Request</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
	<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Request</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>First Name</th>
                                            <th>Second Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $result=mysqli_query($con,"select * from contact_us");
										while($row=mysqli_fetch_assoc($result)){?>
                                        <tr>
                                            <td><?php echo $row['name']?></td>
                                           <td><?php echo $row['lastname']?></td>
                                           <td><?php echo $row['phone']?></td>
                                           <td><?php echo $row['email']?></td>
                                           <td><?php echo $row['message']?></td>
                                            <td class="text-center"><a href="?delete-id=<?php echo $row["id"]; ?>"><i class="fa fa-trash fa-2x"></i></a></td>
                                           
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>< 
	 
	 
	 
	 
<?php include("footer.php"); } ?>