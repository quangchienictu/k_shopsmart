<?php
include 'connection.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shop Smart</title>
	<meta name="description" content="Live Preview Of Oswan eCommerce HTML5 Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- all css here -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/chosen.min.css">
	<link rel="stylesheet" href="assets/css/jquery-ui.css">
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/icofont.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bundle.css">
	<link rel="stylesheet" href="assets/css/style.css?ver=1.1">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="assets/css/easyzoom.css">
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
	
</body>
</head>
<body>
	<div class="wrapper">
		<!-- header start -->
		<header>
			<div class="header-area transparent-bar ptb-55" style="height: 90px">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-4">
							<div class="logo-small-device">
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-8">
							<div class="header-contact-menu-wrapper pl-45">
								<div class="header-contact">
								</div>
								<div class="menu-wrapper text-center">
									
									<div class="main-menu open">
										<nav>
											<ul>
												<li><a href="index.php">Trang chủ</a></li>
												<li><a href="shop.php">Sản phầm</a></li>
												<li><a href="news.php">Tin tức</a></li>

												<li class="active"><a href="about-us.php">Về chúng tôi </a></li>
												<li><a href="contact.php">Liên hệ</a></li>
												<li><a href="baohanh.php">Chính sách</a></li>
												<?php
												if (isset($_SESSION["user-username"])) {
													echo '<li><a href="history.php">Lịch sử đặt</a></li>';
													echo '<li><a href="login.php?logout=1">Hi,'.$_SESSION["user-name"].' </a></li>';
												}else{
													echo '<li><a href="login.php">Đăng nhập</a></li>';
												}
												?>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="header-cart-wrapper">
					<div class="header-cart">
						<?php
						include 'cart-header.php';
						?>
					</div>
				</div>
			</div>
		</header>
		<div class="breadcrumb-area pt-255 pb-170" style="background-image: url(img/header.jpg)">
			<div class="container-fluid">
				<div class="breadcrumb-content text-center">
					<h2>SHOP SMART</h2>
				</div>
			</div>
		</div>