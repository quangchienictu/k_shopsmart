<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Đăng nhập hệ thống</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		include('../connection.php');
		if (isset($_POST['login'])) {
			$username = $_POST['user_name'];
			$password = $_POST['password'];
			$sql = "select * from account where username = '$username' and password = '$password'";
			$query = $conn->query($sql);
			if($row= $query->fetch_array()){
				$_SESSION["username"] = $username;
				$_SESSION['name'] = $row['name'];
				echo '<meta http-equiv="refresh" content="0">';
			}else{
				echo "<script type='text/javascript'>alert('Đăng nhập thất bại');</script>";
			}
		}else if (isset($_GET['logout'])) {
			unset($_SESSION['name']);
			unset($_SESSION['username']);
			echo "<script>location.href='../admin/login.php';</script>";
		} else if (isset($_SESSION["username"])) {
			echo "<script>location.href='../admin';</script>";
		}
	?>
	<div class="container">
		<div id="loginbox" style="margin-top: 50px;"
			class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">Sign In</div>
				</div>
				<div style="padding-top: 30px" class="panel-body">

					<div style="display: none" id="login-alert"
						class="alert alert-danger col-sm-12"></div>

					<form id="loginform" class="form-horizontal" role="form"
						method="post">

						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-user"></i></span> <input id="login-username"
								type="text" class="form-control" name="user_name" value=""
								placeholder="username" required>
						</div>

						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-lock"></i></span> <input id="login-password"
								type="password" class="form-control" name="password"
								placeholder="password" required>
						</div>
						<div style="float:right;">
							<!-- Button -->
							<button id="btn-login" type="submit" name="login" class="btn btn-primary">Login</button>
						</div>
						</br>
						</br>
						<div style="float:right;cursor: pointer;" id="add">
					</div>
					</form>
					
				</div>
			</div>
		</div>
</body>
</html>