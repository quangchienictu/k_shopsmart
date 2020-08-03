<?php
$query = $conn -> query($sql);
while ($row = $query -> fetch_array()) {
	?>
	<div class="product-width col-md-6 col-xl-4 col-lg-6" style="height: 600px; margin-top: 20px">
		<?php if($row['quantity']<=0) echo '<img src="img/hethang.png" style="position:absolute;top: -10px;width: 180px;right: 5px;z-index: 999;">'; ?>
		<div class="product-wrapper mb-35" style="height: 100%">

			<div class="product-img">
				<a href="item-details.php?id=<?php echo $row['id']?>">
					<img style="padding: 20px" height="400" src="<?php echo $row['image']?>" alt="">
				</a>
				<div class="product-content-wrapper" style="position: inherit;">
					<div class="product-title-spreed">
						<h4><?php echo $row['name']?></h4>
						<span><?php echo formatPrice($row['price'])?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>