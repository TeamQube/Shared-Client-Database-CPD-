<?php 
session_start();
if(!isset($_SESSION['facultyname']))
{header("location:faculty-login.php");}
else{include("header.php"); 
	 if(isset($_GET["delete-id"]) and !empty($_GET["delete-id"]))
{
		$id=$_GET["delete-id"];
		$query = mysqli_query($con,"DELETE FROM stdapplyforjob WHERE id=$id"); 
	
}
if(isset($_GET["assing-id"]) and !empty($_GET["assing-id"]))
{
		$id=$_GET["assing-id"];
	    $fid = $_SESSION['facultyname']['id'];
	    $result = mysqli_query($con,"UPDATE stdapplyforjob SET assign='1',facutlyid='$fid'  WHERE id ='$id'");
	    $_SESSION["Project"]="Project Assign Successfully";
}
if(isset($_GET["assingremove-id"]) and !empty($_GET["assingremove-id"]))
{
		$id=$_GET["assingremove-id"];
	    $result = mysqli_query($con,"UPDATE stdapplyforjob SET assign='0'  WHERE id ='$id'");
	    $_SESSION["Project"]="Assign Remove";
}	
?>
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

	         <?php if(isset($_SESSION["Project"])){?>
						  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
								<span class="badge badge-pill badge-success">Success</span>
								<?php echo @$_SESSION["Project"];unset($_SESSION["Project"])?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
								</button>
						  </div>
					<?php }?>
  <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Report</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student Name</th>
                                            
                                            <th>Job Category</th>
                                            <th>Job Title</th>
                                            <th>Post By</th>
                                            <th>Companey Name</th>
                                            <th>Assign Project By</th>
                                            <th>Assign</th>
                                            <th>Project Assigned</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $result=mysqli_query($con,"select * from stdapplyforjob");
										while($row=mysqli_fetch_assoc($result)){?>
                                        <tr>
                                           <td><?php echo $row['id']?></td>
                                           <?php $std = $row['name']; ?>
                                           <td><?php $stdresult = mysqli_query($con,"select * from student where id ='$std'");
															foreach($stdresult as $stdpost)
															{ 
															 echo $stdpost['name'];
															}?></td>
                                           <td><?php if($row['industry'] == ""){ echo $row['internship'];} else {echo $row['industry'];} ?></td>
                                           <td><?php if($row['industry'] == ""){ echo "Internship";} else {echo "Industry Project";} ?></td>
                                           <td><?php 
														if($row['industry'] == "")
														{ 
															$intern = $row['internship'];
															$intresult=mysqli_query($con,"select * from internships where title ='$intern'");
															foreach($intresult as $intpost)
															{
																$empresult=mysqli_query($con,"select * from employee where id=".$intpost['emp_id'] );
																foreach($empresult as $emppost)
																{
																	echo $emppost['username'];
																}
															}
														} else
														{
															$ind = $row['industry'];
															$intresult=mysqli_query($con,"select * from industryproject where title ='$ind'");
															foreach($intresult as $intpost)
															{
																$empresult=mysqli_query($con,"select * from employee where id=".$intpost['emp_id'] );
																foreach($empresult as $emppost)
																{
																	echo $emppost['username'];
																}
															}
															
														}
														 ?> 
                                           </td>
                                           <td><?php 
														if($row['industry'] == "")
														{ 
															$intern = $row['internship'];
															$intresult=mysqli_query($con,"select * from internships where title ='$intern'");
															foreach($intresult as $intpost)
															{
																$empresult=mysqli_query($con,"select * from employee where id=".$intpost['emp_id'] );
																foreach($empresult as $emppost)
																{
																	echo $emppost['cname'];
																}
															}
														} else
														{
															$ind = $row['industry'];
															$intresult=mysqli_query($con,"select * from industryproject where title ='$ind'");
															foreach($intresult as $intpost)
															{
																$empresult=mysqli_query($con,"select * from employee where id=".$intpost['emp_id'] );
																foreach($empresult as $emppost)
																{
																	echo $emppost['cname'];
																}
															}
															
														}
														 ?> 
                                           </td>
                                           <td><?php echo $_SESSION['facultyname']['name']; ?></td>
                                            <td class="text-center"><a href="?assing-id=<?php echo $row["id"]; ?>"><i class="fa fa-check fa-2x"></i></a>
                                            <a href="?assingremove-id=<?php echo $row["id"]; ?>"><i class="fa fa-remove fa-2x"></i></a></td>
                                            <td><?php if($row["assign"] == 0) { echo "";}else{ echo "Assigned";} ?></td>
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
        </div>

<?php include("footer.php");} ?>
