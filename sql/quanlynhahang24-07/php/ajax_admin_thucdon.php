<?php 
	include("connect.php");
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		$sql="UPDATE `oder` SET `trangthai`= 2 WHERE `id_banan` = $id and `trangthai`=1";
		if($conn->query($sql)){
			echo "ok";
		}else{
			echo "err";
		}
	}
 ?>