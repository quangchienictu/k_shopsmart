<?php
include 'header.php';
if (isset($_GET['logout'])) {
    unset($_SESSION["user-username"]);
    unset($_SESSION["user-name"]);
    echo "<script>location.href='login.php';</script>";
} else if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `account` VALUES ('$username', '$password', '$name', '$phone', '$address', 1)";
    $result = $conn -> query($sql);
    if ($result == '') {
        echo "<script type='text/javascript'>alert('Đăng ký thất bại');</script>";
    }else{
        echo "<script type='text/javascript'>alert('Đăng ký thàng công');</script>";
    }
}else if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from account where username = '$username' and password = '$password' and type = 1";
    $query = $conn->query($sql);
    if($row= $query->fetch_array()){
        $_SESSION["user-username"] = $username;
        $_SESSION['user-name'] = $row['name'];
        echo "<script type='text/javascript'>alert('Đăng nhập thành công');</script>";
        echo "<script>location.href='index.php';</script>";
    }else{
        echo "<script type='text/javascript'>alert('Đăng nhập thất bại');</script>";
    }
}
?>
<div class="login-register-area ptb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> Đăng nhập </h4>
                        </a>
                        <a data-toggle="tab" href="#lg2">
                            <h4> Đăng ký </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-form">
                                    <form method="post">
                                        <input type="text" name="username" placeholder="Tên đăng nhập">
                                        <input type="password" name="password" placeholder="Mật khẩu">
                                        <div class="button-box">
                                            <button type="submit" name="login" class="btn-style cr-btn"><span>Ok</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-form">
                                    <form method="post">
                                        <input type="text" name="username" placeholder="Tên đăng nhập" required>
                                        <input type="password" name="password" placeholder="Mật khẩu" required>
                                        <input name="name" placeholder="Họ tên" type="text" required>
                                        <input name="phone" placeholder="Số điện thoại" type="text" required>
                                        <input name="address" placeholder="Địa chỉ" type="text" required>
                                        <div class="button-box">
                                            <button type="submit" name="register" class="btn-style cr-btn"><span>Ok</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>