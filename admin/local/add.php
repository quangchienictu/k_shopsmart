<?php
	if (isset($_POST['add-row'])) {
		$name = $_POST['name'];
		$sql = "INSERT INTO `local` (name) VALUES ('$name')";
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
				<h4 class="modal-title">Thêm địa phương</h4>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<label>Tên địa phương</label> <input
							type="text" class="form-control add-control" name="name" required>
					</div>
					<div class="form-group" style="text-align: right;">
						<input type="submit" class="btn btn-primary" name="add-row" value="Ok"/>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>