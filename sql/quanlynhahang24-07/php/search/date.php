<?php 
	include("../connect.php");
	$date = $_POST['date'];
	$sql="SELECT oder.* ,user.id_user,user.ten_user FROM `oder`,user WHERE user.id_user =oder.id_user AND `time_end` between '$date' and '$date 23:59:59'";
			$data = $conn->query($sql);
		
			while ($row = $data->fetch_assoc()) {
			        $resul[] = $row;
			    }   
	
			echo json_encode($resul);
		
 ?>