<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbName = "shopsmart";
$conn = mysqli_connect($host,$user,$password,$dbName);
mysqli_set_charset($conn,"utf8");
 ?>
<?php if(isset($_POST['value'])){
	$value=$_POST['value'];
}else{
	$value=1;
} ?>


	<?php $sql1="SELECT item.* , sum(cart_detail.`count`) as sl FROM item,cart_detail,cart WHERE item.id = cart_detail.id_item AND cart_detail.id_cart = cart.id AND MONTH(cart.order_date) = $value and YEAR(cart.order_date) =2020 AND cart.status =3  group BY cart_detail.id_item";
					$result_bh = $conn->query($sql1);
				 ?>





<?php if(mysqli_num_rows($result_bh)>0){ ?>
<table id="myTable3" class="table table-striped text-center" style="width:100%">
			<thead>
				<tr>
					
					<td>Mã SP</td>
					<td>Tên SP</td>
					<td>Số lượng bán trong tháng</td>
					<td>Tổng tiền bán</td>
				</tr>
			</thead>
			<tbody>

			

				<?php 
					foreach($result_bh as $key => $valua1):
				 ?>
				
					
					<tr>
						<td><?=$valua1['id']?></td>
					<td><?=$valua1['name']?></td>
					<td><?=$valua1['sl']?></td>
					<td><?=number_format($valua1['sl']*$valua1['price'])?> đ</td>
					</tr>
					

				<?php endforeach ?>
			</tbody>
		</table>


<?php }else{ ?>

	<p>Không có sản phẩm nào được bán trong tháng này </p>
<?php } ?>