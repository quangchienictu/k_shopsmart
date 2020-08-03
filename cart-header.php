<?php
// unset($_SESSION['carts-local']);
$item = null;
if(isset($_POST['add-cart'])){
	$size = $_POST['size'];
	$item = array($_GET['id'], $_POST['count'], $size);
}
if(!isset($_SESSION['carts-local'])){
	$_SESSION['carts-local'] = array();
}
$carts = $_SESSION['carts-local'];
if($item!=null){
	$checkExists = false;
	for($i = 0; $i < count($carts); $i++) {
		$id = $carts[$i][0][0];
		$size = $carts[$i][0][2];
		if ($id == $item[0] && $size == $item[2]) {
			$carts[$i][0][1] = $carts[$i][0][1] + $item[1];
			$checkExists = true;
			break;
		}
	}
	if ($checkExists == false) {
		$carts[] = array($item);
	}
	$_SESSION['carts-local'] = $carts;
	echo "<script type='text/javascript'>alert('Đã thêm vào giỏ hàng');</script>";
}
?>
<button class="icon-cart">
	<i class="ti-shopping-cart"></i>
	<span class="count-style"><?php echo count($carts)?></span>
	<span class="count-price-add"></span>
</button>
<div class="shopping-cart-content" style="overflow: scroll; max-height: 500px">
	<ul>
		<?php
		$total = 0;
		for($i = 0; $i < count($carts); $i++) {
			$id = $carts[$i][0][0];
						// echo json_encode($carts[$i][0]);
			$count = $carts[$i][0][1];
			$size = $carts[$i][0][2];
			$sql = "select *,(select url from image where id_item = a.id limit 1) as image from item a where id =$id";
			$query = $conn->query($sql);
			$row_cart = $query->fetch_array();
			$money = $row_cart['price'] * $count;
			$total = $total + $money;
			?>
			<li class="single-shopping-cart">
				<div class="shopping-cart-img">
					<a href="#"><img width="80" height="80" alt="" src="<?php echo $row_cart['image']?>"></a>
				</div>
				<div class="shopping-cart-title">
					<h3><?php echo $row_cart['name']?></h3>
					<span>Size: <?php echo $size?></span>
					<span>Giá: <?php echo formatPrice($money)?></span>
					<span>Số lượng: <?php echo $count?></span>
				</div>
			</li>
			<?php
		}
		?>
	</ul>
	<div class="shopping-cart-total">
		<h4>Tổng tiền: <span><?php echo formatPrice($total)?></span></h4>
	</div>
	<div class="shopping-cart-btn">
		<a class="btn-style cr-btn" href="cart-detail.php">Xem giỏ hàng</a>
	</div>
</div>