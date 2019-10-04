<?php
session_start();
if(!isset($_SESSION["facultyname"]))
{header("location:faculty-login.php");}
else{include("header.php"); 
if(isset($_GET["delete-id"]) and !empty($_GET["delete-id"]))
{
		$id=$_GET["delete-id"];
		$query = mysqli_query($con,"DELETE FROM course WHERE id=$id"); 
	
}?>
 
  

   <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Course</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="Veiw-Course.php">View Course</a></li>
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
                                <strong class="card-title">View Course</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>                                         
                                            <th>Subject</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $result=mysqli_query($con,"select * from course");
										while($row=mysqli_fetch_assoc($result)){?>
                                        <tr>
                                            <td><?php echo $row['id']?></td>
                                            <td><?php echo $row['name']?></td>
                                            <?php $subjectid = $row['subject'];?>
                                            <td>
                                           <?php
												$cresult=mysqli_query($con,"select * from course where id=".$row['id']);
												foreach($cresult as $crow);

												$sresult=mysqli_query($con,"select * from subject where id in(".$crow['subject'].")");
												foreach($sresult as $srow){?>
													<p><?php echo $srow['name'];?></p>
												<?php  
												}?>
                                           </td>
                                            <td class="text-center"><a href="Course.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
                                            <td class="text-center"><a href=""><i class="fa fa-trash fa-2x"></i></a></td>
                                           
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
