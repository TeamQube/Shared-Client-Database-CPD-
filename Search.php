<?php
	
	include('connection.php');
	if(isset($_POST['Search']) and !empty($_POST['Search'])){
		$search=mysqli_query($con,"SELECT 'student' AS `Nature`,id , name , father_name , phone  FROM student WHERE name LIKE '%".$_POST['Search']."%' OR father_name LIKE '".$_POST['Search']."%' OR phone LIKE '".$_POST['Search']."%' OR id LIKE '".$_POST['Search']."%' UNION SELECT 'staff' AS `Nature`,id , name , father_name , phone  FROM staff WHERE name LIKE '%".$_POST['Search']."%' OR father_name LIKE '".$_POST['Search']."%' OR phone LIKE '".$_POST['Search']."%' OR id LIKE '".$_POST['Search']."%' UNION SELECT 'faculty' AS `Nature`,id , name , father_name , phone  FROM faculty WHERE name LIKE '%".$_POST['Search']."%' OR father_name LIKE '".$_POST['Search']."%' OR phone LIKE '".$_POST['Search']."%' OR id LIKE '".$_POST['Search']."%' ");
		$searchcount=mysqli_num_rows($search);
		if($searchcount>0){
			foreach($search as $row){
			?>
			<div class="kt-notification__item">
				
				<div style="position:relative" class="kt-notification__item-details pl-2">
					<div class="kt-notification__item-title" style="color:black">
						<b>
						<?php
				         if($row['Nature'] == "student"){
							 echo '<i class="fa fa-user fa-2x fa-fw"></i>';
						 }else if($row['Nature'] == "faculty" || $row['Nature'] == "staff"){
							 echo '<i class="fa fa-user fa-2x fa-fw"></i>';
						 }
						
						?>
						<?php echo $row['name'];?></b><br/>
						Father Name : <?php echo $row['father_name'];?><br/>
						Phone Number : <?php echo $row['phone'];?>
					</div><br>
					<a class="btn btn-default" style="position:absolute; line-height:25px; width:115px; padding:0; top:0; right:0;" href="<?php
				         if($row['Nature'] == "student"){
							 echo 'Veiw-Student.php';
						 }else if($row['Nature'] == "faculty"){
							 echo 'Veiw-Faculty.php';
						 }else if($row['Nature'] == "staff")
						 {
						 echo 'Veiw-Staff.php';
						 }
				
						
						?>?id=<?php echo $row['id'];?>">View Details</a>
				</div>
			</div>
			<?php
			}
		}
	}
?>



