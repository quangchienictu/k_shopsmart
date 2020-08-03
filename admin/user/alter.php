<?php
	if (isset($_POST['submit-edit-row'])) {
		$username = $_POST['user_name'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$sql = "UPDATE `account` SET `password`='$password',`name`='$name',`phone`='$phone',`address`='$address' WHERE `username`='$username'";
		$result = $conn -> query($sql);
		if ($result == '') {
			echo "<script type='text/javascript'>alert('Update fail');</script>";
		}else{
			echo "<script type='text/javascript'>alert('Update success');</script>";
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
?>
<div id="update-row" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Cập nhập quản trị</h4>
			</div>
			<div class="modal-body">
				<form method="post">
					<?php
						if(isset($_POST['edit'])){
							$id = $_POST['edit'];
							$sql = "select * from account where username = '$id'";
							$query = $conn -> query($sql);
							$row = $query -> fetch_array();
					?>
					<div class="form-group">
						<label>Tên đăng nhập</label> <input
							type="text" class="form-control add-control" value="<?php echo $row['username'];?>" readonly="readonly" name="user_name" required>
					</div>
					<div class="form-group">
						<label>Mật khẩu</label> <input
							type="password" class="form-control add-control" value="<?php echo $row['password'];?>" name="password" required>
					</div>
					<div class="form-group">
						<label>Họ tên</label> <input
							type="text" class="form-control add-control" name="name" value="<?php echo $row['name'];?>" required>
					</div>
					<div class="form-group">
						<label>Địa chỉ</label> <input
							type="text" class="form-control add-control" name="address" value="<?php echo $row['address'];?>" required>
					</div>
					<div class="form-group">
						<label>Số điện thoại</label> <input
							type="text" class="form-control add-control" name="phone" value="<?php echo $row['phone'];?>" required>
					</div>
					<div class="form-group" style="text-align: right;">
						<input type="submit" class="btn btn-primary" name="submit-edit-row" value="Ok"/>
					</div>
					<script type="text/javascript">
						$('#update-row').modal('show');
					</script>
					<?php 
						}
					?>
				</form>
			</div>
		</div>

	</div>
</div>