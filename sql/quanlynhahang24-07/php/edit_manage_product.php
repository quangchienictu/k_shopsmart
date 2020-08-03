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
    $sql = "SELECT * FROM sp WHERE id_sp= $id";
    $result = mysqli_query($conn,$sql);
    
    if($row =mysqli_fetch_array($result)){
      $id_sp=$row['id_sp'];
      $ten_sp = $row['ten_sp'];
      $gia_sp = $row['gia_sp'];
      $khuyenmai_sp = $row['khuyenmai_sp'];
      $file = $row['img_sp'];
      $loai_sp=$row['loai_sp'];
        
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa Thông Tin Sản Phẩm</title>
  <?php  require("../css/style.php")?>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<form style="margin:auto;width:80%;padding-top:20px;" action='' method='post'>
        <h2 style="text-align:center; color:red;">Sửa Thông Tin Sản Phẩm</h2>
        <div class="form-group">
            <label for="exampleFormControlInput1">ID:</label>
            <input type="text" class="form-control"   name="id_sp"  readonly value="<?php echo  $id_sp;?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">SẢN PHẨM:</label>
            <input type="text" class="form-control"  placeholder="bò nướng cay" name="ten_sp" value="<?php echo  $ten_sp;?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">GIÁ SẢN PHẨM :</label>
            <input type="text" class="form-control"  placeholder="300000 đ" name="gia_sp" value="<?php echo  $gia_sp;?> đ">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">KHUYẾN MÃI :</label>
            <input type="khuyenmai_sp" class="form-control"  placeholder="0$" name="khuyenmai_sp" value="<?php echo  $khuyenmai_sp;?>%">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">LOẠI SẢN PHẨM</label>
            <select class="form-control" name='loai_sp' >
            <option value='1' >gà</option>
            <option value='2' >vịt</option>
            <option value="3" class="value">bò</option>
            <option value="4" class="value">dê</option>
            <option value="5" class="value">lẩu</option>
            <option value="6" class="value">khai vị</option>
            <option value="7" class="value">đồ uống</option>
            <option value="8" class="value">hải sản</option>
            </select>
        </div>
        <div class="custom-file">
        <input type="file" class="custom-file-input" id="input-image" name='file' value="image/<?php echo  $file;?>">
        <label class="custom-file-label" >CHỌN ẢNH :</label>
        </div>
        
        <img id="image-product" src="<?php echo "../image/".$file ?>" alt="your image" />
        <button type="submit" class="btn btn-primary button " style='margin-top:20px;'>Thêm</button>  

</body>
</html>
<?php
require("connect.php");

// insert database staff
    $id_sp="";
    $ten_sp = "";
    $gia_sp = "";
    $khuyenmai_sp = "";
    $file = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["id_sp"])) { $id_sp = $_POST['id_sp']; }
    if(isset($_POST["ten_sp"])) { $ten_sp = $_POST['ten_sp']; }
    if(isset($_POST["gia_sp"])) { $gia_sp = $_POST['gia_sp']; }
    if(isset($_POST["khuyenmai_sp"])) { $khuyenmai_sp = $_POST['khuyenmai_sp']; }
    if(isset($_POST["file"])) { $file = $_POST['file']; }


    //Code xử lý, insert dữ liệu vào table
    $insert = "UPDATE sp SET ten_sp='$ten_sp', gia_sp='$gia_sp',khuyenmai_sp='$khuyenmai_sp', img_sp='$file'
   WHERE id_sp ='$id_sp' ;";
   $result = mysqli_query($conn,$insert);
   

       if ($result === TRUE) {
           // hàm chuyển đến trang khác
           header("location: manage_product.php"); 
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

<script type="text/javascript"> 
   function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image-product').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#input-image").change(function() {
  readURL(this);
});
</script> 
