<?php 
	include("connect.php");
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		$tongtien=$_POST['tongtien'];
		$id_user = $_POST['id_user'];
		$sql="UPDATE `oder` SET `id_user`=$id_user, `trangthai`= 3, `tongtien`=$tongtien WHERE `id_banan` = $id AND `trangthai`=2";
		if($conn->query($sql)){
			echo "ok";
		}else{
			echo "err";
		}
	}
 ?>