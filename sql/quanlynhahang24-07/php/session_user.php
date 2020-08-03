<?php   
include("connect.php");
session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $sdt = mysqli_real_escape_string($conn,$_POST['sdt']);     

      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);

      $sql = "SELECT * FROM user WHERE sdt_user='$sdt' and matkhau = '$mypassword'";

      $result = mysqli_query($conn,$sql);

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);


      // If result matched $sdt and $mypassword, table row must be 1 row

      if($count == 1) {

          $_SESSION['login_user'] = $sdt;
           $sql2="SELECT * FROM user where sdt_user = ".$_SESSION['login_user'];
                $result2 = $conn->query($sql2);
                $data = $result2->fetch_assoc();
          if($data['quyen_user']==0){
              header("location: admin.php");
          }else{
            header("location: check_book.php");
          }
      }else {
         header("location: login.php");
         $_SESSION['error'] = "Bạn nhập sai số điện thoại hoặc mật khẩu";

      }

   }
 ?>