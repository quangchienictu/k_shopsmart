<?php 
	include("connect.php");
	$sql="SELECT oder.* ,user.id_user,user.ten_user FROM `oder`,user WHERE user.id_user =oder.id_user order by oder.time_end DESC";
			$data = $conn->query($sql);
			while ($row = $data->fetch_assoc()) {
			        $results[] = $row;
			    }   
echo json_encode($results);
 ?>