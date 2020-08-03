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
<?php
    require("connect.php");

    // select id data
    $id =$_GET['id'];
    $sql = "SELECT * FROM user WHERE id_user= $id";
    $result = mysqli_query($conn,$sql);
    $row =mysqli_fetch_array($result);
    if($row){
        $id =$row["id_user"];
        $hoten = $row["ten_user"];
        $sdt = $row["sdt_user"];
        $email = $row['email_user'];
        $chucvu = $row["quyen_user"];
        $matkhau = $row["matkhau"];
        
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin</title>
    <?php  require("../css/style.php")?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/category.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<form style="margin:auto;width:80%;padding-top:20px;" action='' method='post'>
        <h2 style="text-align:center; color:red;">Thay Đổi Thông Tin Nhân Viên</h2>
        <div class="form-group">
            <label for="exampleFormControlInput1">ID :</label>
            <input type="text" readonly class="form-control"  name="id"  value="<?php echo  $id;?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">HỌ VÀ TÊN :</label>
            <input type="text" class="form-control"  placeholder="Lê Văn Tình" name="hoten"  value="<?php echo  $hoten;?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">SỐ ĐIỆN THOẠI :</label>
            <input type="text" class="form-control"  placeholder="0867175706" name="sdt" value="<?php echo  $sdt;?>"> 
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">EMAIL :</label>
            <input type="email" class="form-control"  placeholder="letinh1608@gmail.com" name="email" value="<?php echo  $email;?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">CHỨC VỤ</label>
            <select class="form-control" name='chucvu' value="<?php echo  $chucvu;?>">
            <option value='0' >admin</option>
            <option value='1' >nhân viên</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">MẬT KHẨU :</label>
            <input type="text" class="form-control"  placeholder="123456" name='matkhau' value="<?php echo  $matkhau;?>">
        </div>
        <button type="submit" class="btn btn-primary  ">Chỉnh Sửa</button>  
        <button type="reset" class="btn btn-secondary button " style="margin-left:5px;">Hủy</button>
    </form> 
</body>
</html>
<?php
require("connect.php");

// insert database staff
$id_user = "";
$hoten_user = "";
$sdt_user = "";
$email_user = "";
$chucvu_user = "";
$matkhau_user = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["id"])) { $id_user = $_POST['id']; }
    if(isset($_POST["hoten"])) { $hoten_user = $_POST['hoten']; }
    if(isset($_POST["sdt"])) { $sdt_user = $_POST['sdt']; }
    if(isset($_POST["email"])) { $email_user = $_POST['email']; }
    if(isset($_POST["chucvu"])) { $chucvu_user = $_POST['chucvu']; }
    if(isset($_POST["matkhau"])) { $matkhau_user = $_POST['matkhau']; }

    //Code xử lý, insert dữ liệu vào table
    $insert = "UPDATE user SET ten_user='$hoten_user', sdt_user='$sdt_user',quyen_user ='$chucvu_user', email_user='$email_user',matkhau='$matkhau_user'
   WHERE id_user ='$id_user' ;";
   $result = mysqli_query($conn,$insert);
   

       if ($result === TRUE) {
           // hàm chuyển đến trang khác
           header("location: manage_admin.php"); 
           // end
           echo '<script language="javascript">';
           echo 'alert("sửa  thành công!")';
           echo '</script>';

       } else {
           echo "Error: " . $insert . "<br>" . mysqli_connect_error();
       }
    
}
//Đóng database
mysqli_close($conn);

?>