<?php 
	include("../connect.php");
	$month = $_POST['month'];
	$sql="SELECT oder.* ,user.id_user,user.ten_user FROM `oder`,user WHERE user.id_user =oder.id_user AND `time_end`  and MONTH(`time_end`) = $month";
			$data = $conn->query($sql);
		
			while ($row = $data->fetch_assoc()) {
			        $resul[] = $row;
			    }   
			
			echo json_encode($resul);
		
 ?>