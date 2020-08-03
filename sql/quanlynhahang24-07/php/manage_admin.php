
<?php require('connect.php'); ?>

<?php 
include('session_user.php');
if(isset($_SESSION['login_user'])){
  $sql="SELECT * FROM user where sdt_user = ".$_SESSION['login_user'];
  $result = $conn->query($sql);
  $data = $result->fetch_assoc();
  if($data['quyen_user']==0){
  }else{
   header('Location:check_book.php');

 }
}else{
 header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đăng Nhập</title>
    <?php  require("../css/style.php")?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header_user.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- <div class="loader">
        <img src="../image/load.gif">
    </div> -->
    <div class="container-fuild">
            <div>
                <?php  require("header_admin.php");?>
            </div>
            <div class="container__body">
                <h1 class="mt-4">Thông Tin Quản Trị</h1>
                <div >
                    <button type="button" class="btn btn-primary button "><a href="insert_form_staff.php" class="" style="color:white;">Thêm</a></button>
                </div>
                <table class="table table-bordered table__body">
                    <thead class='thead-purple'>
                        <tr>
                            <th>Họ tên</th>    
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Chức vụ</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php 
                            require("connect.php");
                            $sql = "SELECT * FROM user";
                            $result = mysqli_query($conn,$sql);
                            
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $id=$row['id_user'];
                                    $quyen="";
                                    if($row["quyen_user"]){
                                        $quyen="admin";
                                    }else{
                                        $quyen="nhân viên";
                                    }
                                    echo"<tr><td>"
                                    .$row["ten_user"].
                                    "</td><td>"
                                    .$row["sdt_user"].
                                    "</td><td>"
                                    .$row["email_user"].
                                    "</td><td>"
                                    .$quyen.
                                    "</td><td>
                                    <a href='edit_form_staff.php?id=$id'\">Sửa</a>
                                    </td><td>
                                    <a href='delete_staff.php?id=$id'\">Xóa</a>
                                    </td></tr>";

                                }
                            }    
                        ?>
                    </tbody>
                </table>
            </div>        
    </div>
</body>
</html>