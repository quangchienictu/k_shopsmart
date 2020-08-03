
<?php
function render_row($row){
	$image = $row['image'];
	$name = $row['name'];
	$price = formatPrice($row['price']);
	$count = $row['count'];
	$size = $row['size'];
	echo "<tr>
	<td style=width:150px>
	<img  width=100 height=100 src='../$image'>
	</td>
	<td>
	$name
	</td>
	<td>
	$size
	</td>

	<td >
	$count 
	</td>
	<td>
	$price
	</td>
	</tr>";
}
if (isset($_POST['confirm'])) {
	$id = $_POST['confirm'];
	$sql = "UPDATE cart set status = (status + 1) WHERE id = $id";
	if ($conn -> query($sql)) {
		echo "<script type='text/javascript'>alert('Xác nhận thành công');</script>";
	}else{
		echo "<script type='text/javascript'>alert('Xác nhận thất bại');</script>";
	}
}else if (isset($_POST['cancel'])) {
	$id = $_POST['cancel'];
	$sql = "UPDATE cart set status = -1 WHERE id = $id";
	
	$sql_return ="SELECT * from cart_detail where id_cart = $id";
	$result_return = $conn->query($sql_return);
	
	if ($conn -> query($sql)) {
		echo "<script type='text/javascript'>alert('Huỷ thành công');</script>";


		
		foreach ($result_return as  $value2) {
			$sql_select = "SELECT * FROM item where id = $value2[id_item]";
			$result_select = $conn->query($sql_select);
			$data_select = $result_select->fetch_assoc();

			$sl= $data_select['quantity'];
			$sl2 = $value2['count'];
			$temp=$sl+$sl2;

			$sql_update = "UPDATE `item` SET `quantity` =$temp where id =  $value2[id_item]";
			$conn -> query($sql_update);
			
		}
	}else{
		echo "<script type='text/javascript'>alert('Huỷ thất bại');</script>";
	}
}

$sql = "SELECT * FROM cart a inner join account b on a.username = b.username order by id desc";
$query = $conn -> query($sql);
while ($row = $query -> fetch_array()) {
	?>
	<div>
		<h3 style="color: red">
			<b>Người đặt: <?php echo $row['name']?></b>
		</h3>
		<h5>Địa chỉ người đặt: <?php echo $row['address']?></h5>
		<h5>SDT: <?php echo $row['phone']?></h5>
		<h5>Ngày đặt: <?php echo $row['order_date']?></h5>
		<h5 style="color: red"><?php echo getStatus($row['status'])?></h5>
		<div class="table-responsive">
			<table class="table">
				<thead class="text-primary">
					<th style="font-size: 15pt;">
						Hình ảnh
					</th>
					<th style="font-size: 15pt;">
						Tên sản phầm
					</th>
					<th style="font-size: 15pt">
						Màu sắc
					</th>
					<th style="font-size: 15pt">
						Số lượng
					</th>
					<th style="font-size: 15pt;">
						Tổng tiền
					</th>
				</thead>
				<tbody>
					<?php
					$sql =  "SELECT a.*, b.name, (select url from image where id_item = b.id limit 1) as image from cart_detail a inner join item b on a.id_item = b.id where id_cart = ".$row['id'];
					$query1 = $conn -> query($sql);
					while ($row1 = $query1-> fetch_array()) {
						render_row($row1);
					}
					?>
				</tbody>
			</table>
		</div>

		<?php
		if ($row['status'] <= 2 && $row['status'] >= 0) {
			?>
			<form method="post">
				
				<div class="form-group" style="text-align: right;">
					
					<button type="submit" class="btn btn-primary" name="confirm" value="<?php echo $row['id']?>">
						<?php
						echo getStatusAction($row['status']);
						?>
					</button>
					<button style="margin-left: 10px;" type="submit" value="<?php echo $row['id']?>" name="cancel" id='add' class='btn btn-primary'>Huỷ</button>
				</div>
			</form>
			<?php
		}
		?>
		<hr/>
	</div>
	<?php
}
?>
