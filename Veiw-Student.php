<?php
session_start();
if(!isset($_SESSION["facultyname"]))
{header("location:faculty-login.php");}
else{include("header.php"); 
if(isset($_GET["delete-id"]) and !empty($_GET["delete-id"]))
{
		$id=$_GET["delete-id"];
		$query = mysqli_query($con,"DELETE FROM student WHERE id=$id"); 
	
}?>
 
  

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
                            <li><a href="Veiw-Student.php">View Faculty</a></li>
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
                                <strong class="card-title">View Student</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Father Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Date Of Birth</th>
                                            <th>Joinig Date</th>
                                            <th>Faculty</th>
                                            <th>Session</th>
                                            <th>Course</th>
                                            <th>Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $result=mysqli_query($con,"select * from student");
										while($row=mysqli_fetch_assoc($result)){?>
                                        <tr>
                                            <td><?php echo $row['id']?></td>
                                            <td><?php echo $row['name']?></td>
                                            <td><?php echo $row['father_name']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['phone']?></td>
                                            <td><?php echo $row['address']?></td>
                                            <td><?php echo $row['date_of_birth']?></td>
                                            <td><?php echo $row['joining_date']?></td>
                                            <?php $facultyid = $row['faculty_id'];?>
                                            <td>
                                            <?php $fresult = mysqli_query($con,"select * from faculty where id='$facultyid'");
											while($frow = mysqli_fetch_assoc($fresult)){
											echo $frow['name'];}?>
                                            </td>
                                            <?php $sessionid = $row['session_id'];?>
                                            <td>
                                            	<?php $sresult = mysqli_query($con,"select * from session where id ='$sessionid'");
											while($srow = mysqli_fetch_assoc($sresult)){
											echo $srow['time'];}?>
                                            </td>
                                            <?php $courseid = $row['course_id'];?>
                                            <td>
                                            <?php $cresult = mysqli_query($con,"select * from course where id ='$courseid'");
											while($crow = mysqli_fetch_assoc($cresult)){
											echo $crow['name'];}?>
                                           </td>
                                            <td><img src="<?php echo $row['image']?>" alt="Image Not Found" width="50" height="50"></td>
                                            <td class="text-center"><a href="Student.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
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
        </div><!-- .content -->


    </div>
 
 
 
 <?php include("footer.php"); }?>
