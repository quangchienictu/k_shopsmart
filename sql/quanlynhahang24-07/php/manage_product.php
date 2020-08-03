
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
    <title>Quản Lý Sản Phẩm</title>
    <?php  require("../css/style.php")?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/header_user.css">
</head>
<body>
    <!-- <div class="loader">
        <img src="../image/load.gif">
    </div> -->
    <div class="container-fuild">
        <div>
            <?php require("header_admin.php");?>
        </div>
        <div style='margin-top:70px;' class="m-3">     
            <h1 class="mt-4" >Quản Lý Món Ăn</h1>
            <button class="btn btn-primary button " style='margin-bottom:10px;'><a href="insert_product_form.php" style="color:white;">Thêm</a></button>
            <table class="table table-bordered">
                <thead class="thead-purple">
                    <th>Tên món ăn</th>
                    <th>Giá sản phẩm</th>
                    <th>Khuyến mãi</th>
                    <th>Giá khuyến mãi</th>
                    <th>Hình ảnh</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </thead>
                <tbody>
                <?php
                    require("connect.php");
                    //  select * from ql_nhanvien
                    $sql = "SELECT * FROM sp";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0){
                                            
                    while ($row = mysqli_fetch_assoc($result)){
                    $khuyenmai=$row["khuyenmai_sp"];
                    $gia_sp=$row["gia_sp"];
                    $giakhuyenmai=$gia_sp-(($gia_sp * $khuyenmai)/100);
                    $id= $row["id_sp"];
                    $image=$row['img_sp'];
                    $image_src='../image/'.$image;
                    
                    echo "<tr><td>"
                    .$row["ten_sp"].
                    "</td><td>"
                    .$row["gia_sp"].
                    " đ</td><td>"
                    .$row["khuyenmai_sp"].
                    "%</td><td>"
                    .$giakhuyenmai.
                    " đ</td><td>";
                    echo "<div> <img  src=$image_src  style=' width:250px'></div>";
                    echo "</td><td>";
                    echo" <a href='edit_manage_product.php?id=$id'\">Sửa</a>
                    </td><td>
                    <a href='delete_manage_product.php?id=$id'\">Xóa</a>
                    </td></tr>";
                    }
                    }
                    else{
                        echo" 0 result";
                        }
                    mysqli_close($conn);

                ?>
                </tbody>
            </table>  
        </div>
    </div>
    
</body>
</html>