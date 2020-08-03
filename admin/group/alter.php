<?php
	if (isset($_POST['submit-edit-row'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$sql = "UPDATE `group` SET `name`='$name' WHERE `id`='$id'";
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
				<h4 class="modal-title">Cập nhập danh mục</h4>
			</div>
			<div class="modal-body">
				<form method="post">
					<?php
						if(isset($_POST['edit'])){
							$id = $_POST['edit'];
							$sql = "select * from `group` where id = '$id'";
							$query = $conn -> query($sql);
							$row = $query -> fetch_array();
					?>
					<div class="form-group">
						<label>Mã danh mục</label> <input
							type="text" class="form-control add-control" value="<?php echo $row['id'];?>" readonly="readonly" name="id" required>
					</div>
					<div class="form-group">
						<label>Tên danh mục</label> <input
							type="text" class="form-control add-control" value="<?php echo $row['name'];?>" name="name" required>
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