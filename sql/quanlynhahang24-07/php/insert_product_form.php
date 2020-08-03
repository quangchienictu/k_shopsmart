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
    <title>Thêm Sản Phẩm</title>
    <?php  require("../css/style.php")?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    
</head>
<body>
    <form style="margin:auto;width:80%;padding-top:20px;" action='' method='post'>
        <h2 style="text-align:center; color:red;">Thêm Sản Phẩm</h2>
        <div class="form-group">
            <label for="exampleFormControlInput1">SẢN PHẨM:</label>
            <input type="text" class="form-control"  placeholder="bò nướng cay" name="ten_sp" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">GIÁ SẢN PHẨM :</label>
            <input type="text" class="form-control"  placeholder="300000 đ" name="gia_sp">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">KHUYẾN MÃI :</label>
            <input type="khuyenmai_sp" class="form-control"  placeholder="0$" name="khuyenmai_sp">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">LOẠI SẢN PHẨM</label>
            <select class="form-control" name='loai_sp' >
            <option value='1' >gà</option>
            <option value='2' >vịt</option>
            <option value="3" >bò</option>
            <option value="4" >dê</option>
            <option value="5" >lẩu</option>
            <option value="6" >khai vị</option>
            <option value="7" >đồ uống</option>
            <option value="8" >hải sản</option>
            </select>
        </div>
        <div class="custom-file">
        <input type="file" class="custom-file-input" id="input-image" name='file'>
        <label class="custom-file-label" >CHỌN ẢNH :</label>
        </div>
        <br>
        <img id="image-product" src="../image/bebe_rangmuoi.jpg" alt="your image" />
        <button type="submit" class="btn btn-primary button " style='margin-top:20px;'>Thêm</button>  
    </body>
</html>
<?php
    require("connect.php");

    // insert database staff
    $ten_sp = "";
    $gia_sp = "";
    $khuyenmai_sp = "";
    $file = "";
    $loai_sp="";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["ten_sp"])) { $ten_sp = $_POST['ten_sp']; }
        if(isset($_POST["gia_sp"])) { $gia_sp = $_POST['gia_sp']; }
        if(isset($_POST["khuyenmai_sp"])) { $khuyenmai_sp = $_POST['khuyenmai_sp']; }
        if(isset($_POST["file"])) { $file = $_POST['file']; }
        if(isset($_POST["loai_sp"])) { $loai_sp = $_POST['loai_sp']; }
        
        //Code xử lý, insert dữ liệu vào table
        
        if($ten_sp=="")
        {
            header("location:insert_product_form.php"); 
            
            
        }
        else{
        $insert = "INSERT INTO sp (ten_sp, gia_sp, khuyenmai_sp,img_sp,loai_sp)
        VALUES ('$ten_sp', '$gia_sp', '$khuyenmai_sp','$file','$loai_sp' )";
        $connect =mysqli_query($conn,$insert);
        if ($connect === TRUE) {
                // hàm chuyển đến trang khác
                header("location:manage_product.php"); 
                echo '<script language="javascript">';
                echo 'alert("thêm thành công!")';
                echo '</script>';
        } else {
            echo "Error: " . $insert . "<br>" . mysqli_connect_error();
        }
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
