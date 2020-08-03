<?php
	if (isset($_POST['add-row'])) {
		$username = $_POST['user_name'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$sql = "INSERT INTO `account` VALUES ('$username', '$password', '$name', '$phone', '$address', 0)";
		$result = $conn -> query($sql);
		if ($result == '') {
			echo "<script type='text/javascript'>alert('Insert fail');</script>";
		}else{
			echo "<script type='text/javascript'>alert('Insert success');</script>";
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
?>
<div id="insert" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Thêm quản trị</h4>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<label>Tên đăng nhập</label> <input
							type="text" class="form-control add-control" name="user_name" required>
					</div>
					<div class="form-group">
						<label>Mật khẩu</label> <input
							type="password" class="form-control add-control" name="password" required>
					</div>
					<div class="form-group">
						<label>Họ tên</label> <input
							type="text" class="form-control add-control" name="name" required>
					</div>
					<div class="form-group">
						<label>Địa chỉ</label> <input
							type="text" class="form-control add-control" name="address" required>
					</div>
					<div class="form-group">
						<label>Số điện thoại</label> <input
							type="text" class="form-control add-control" name="phone" required>
					</div>
					<div class="form-group" style="text-align: right;">
						<input type="submit" class="btn btn-primary" name="add-row" value="Ok"/>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>