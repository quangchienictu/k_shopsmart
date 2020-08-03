<?php 

$date = $_GET['date'];


?>


<thead>
	<tr>
		<td>Mã SP</td>
		<td>Tên SP</td>
		<td>Số lượng trong kho</td>
		<td>Tổng tiền</td>
		<td>Tình trạng</td>
	</tr>
</thead>
<tbody>
	<?php $sql= "SELECT * FROM item ";
	$result_item = $conn->query($sql); ?>
	<?php 
	foreach($result_item as $key => $valua1):
		?>


		<tr>
			<td><?=$valua1['id']?></td>
			<td><?=$valua1['name']?></td>
			<td><?=$valua1['quantity']?></td>
			<td><?=number_format($valua1['quantity']*$valua1['price'])?> đ</td>
			<td><?php if($valua1['quantity']<10&&$valua1['quantity']>0){
				echo "<b style='color:#956edc'>Sắp hết</b>";
			}else if($valua1['quantity']==0) echo "<b style='color:red'>Hết hàng</b>"; ?></td>
		</tr>


	<?php endforeach; ?>

</tbody>