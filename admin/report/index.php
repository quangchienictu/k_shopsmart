<?php
$timeF = "";
$timeT = "";
if (isset($_POST['time-from'])) {
	$timeF = $_POST['time-from'];
}
if (isset($_POST['time-to'])) {
	$timeT = $_POST['time-to'];
}
if (isset($_POST['thu-nhap'])) {
	echo "<script>window.open('report/phieu.php?time-from=$timeF&time-to=$timeT', '_blank');</script>";
}
?>



<form id="report" method="post">
	<div id="material-tabs">
		<div class="report-group">
			<label>Thời gian bắt đầu</label> 
			<input type="date" class="form-control add-control" name="time-from">
		</div>
		<div class="report-group">
			<label>Thời gian kết thúc</label> 
			<input type="date" class="form-control" name="time-to">
		</div>
	</div>
	<div class="report-div">
		<button type='submit' name="thu-nhap" class='btn-report'>Báo cáo doanh thu</button>"
	</div>
</form>


<div class="card">
	<div class="card-body" style="font-size: 15px;">
		<div class="alert alert-warning" >
			<span style="font-weight: bold;">Báo cáo bán hàng tháng </span>

		</div>
		<label></label><select id="baocaohangthang" class="mb-5">
			<option value="1">Tháng 1</option>
			<option value="2">Tháng 2</option>
			<option value="3">Tháng 3</option>
			<option value="4">Tháng 4</option>
			<option value="5">Tháng 5</option>
			<option value="6">Tháng 6</option>
			<option  value="7">Tháng 7</option>
			<option selected value="8">Tháng 8</option>
			<option value="9">Tháng 9</option>
			<option value="10">Tháng 10</option>
			<option value="11">Tháng 11</option>
			<option value="12">Tháng 12</option>
		</select>
		<div id="noidung_bc">
			<?php $sql1="SELECT item.* , sum(cart_detail.`count`) as sl FROM item,cart_detail,cart WHERE item.id = cart_detail.id_item AND cart_detail.id_cart = cart.id AND MONTH(cart.order_date) = 8 and YEAR(cart.order_date) =2020 AND cart.status =3  group BY cart_detail.id_item";
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
		</div>

	</div>
</div>
<div class="card">
	<div class="card-body" style="font-size: 15px;">
		<p class="alert alert-danger" style="font-weight: bold;">Báo cáo  tồn kho </p>
		<div>
			<!-- <form name="myForm">
				<div class="form-group">
			<label>Ngày :</label>
			<input type="radio" checked name="check" value="ok" style="display: inline;margin-left: 20px;">Hôm nay
			<input type="radio" name="check" id="check"   value="none" style="display: inline;margin-left: 20px;">Ngày khác
			<input type="date" name="date"  id="date" style="margin-left: 10px;display:none;">
			</form> -->
		</div>
		</div>
		<table id="myTable1" class="table table-striped text-center" style="width:100%">
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
				<?php $sql= "SELECT * FROM item";
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
		</table>

	</div>
</div>


<div class="card">
	<div class="card-body" style="font-size: 15px;">
		<p class="alert alert-success" style="font-weight: bold;">Báo cáo doanh thu năm <?=date("Y");?></p>
		<table id="myTable2" class="table table-striped text-center" style="width:100%">
			<thead>
				<tr>

					<td>Tháng</td>
					<td>Doanh thu</td>
				</tr>
			</thead>
			<tbody>

				<?php for($i=1;$i<(int)date("m")+1;$i++){ ?>
					<tr >
						<th class="text-center">Tháng <?=$i?></th>
						<?php 
						$sql5="SELECT sum(cart_detail.price) as tt FROM cart_detail LEFT JOIN cart on cart_detail.id_cart = cart.id WHERE MONTH(cart.order_date) = $i AND cart.status =3";
						$result5 = $conn->query($sql5);
						$data5 = $result5->fetch_assoc();
						$thang_all = number_format($data5['tt']);

						?>
						<th class="text-center"><?=$thang_all?> đ</th>


					</tr>
				<?php } ?>

			</tbody>
		</table>

	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#baocaohangthang").change(function(){
			var value = $("#baocaohangthang").val();
			$.ajax({
				url:'report/baocaohangthang.php',
				method : 'POST',
				dataType: 'html',
				data: {
					value:value,
				}
			}).done(function(ketqua){
				$("#noidung_bc").html(ketqua);
			});
		})
	});



</script>

<script type="text/javascript">
	/*var now = new Date();

var day = ("0" + now.getDate()).slice(-2);
var month = ("0" + (now.getMonth() + 1)).slice(-2);

var today = now.getFullYear()+"-"+(month)+"-"+(day) ;*/

/*$('#date').val(today);*/




 var rad = document.myForm.check;
 console.log( rad);
var prev = null;
for (var i = 0; i < rad.length; i++) {
    rad[i].addEventListener('change', function() {
     	console.log( rad[i]);
        if (this !== prev) {
            prev = this;
        }
        if(this.value=="none"){
            document.querySelector("#date").style.display="inline";
          document.getElementById('date').valueAsDate = new Date();
        }else{
             document.querySelector("#date").style.display="none";
        }
    });

}

</script>