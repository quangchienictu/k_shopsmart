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
    <title>Trang Quản Lý</title>
    <?php  require("../css/style.php")?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header_user.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
    <div class="loader">
        <img src="../image/load.gif">
    </div>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <?php require("header_admin.php") ?>
            </div>
        </div>
        <div class="row" >
            <div class="col-lg-4 croll list-menu" id="load">
             
             </div>
            <div class="col-lg-8" >
                <div class="row croll" id="load_ban">
                 
                </div>
            </div>

        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    $(window).on('load', function(event) {
   $('body').removeClass('preloading');
   $('.loader').delay(3000).fadeOut('fast');
});
    $( document ).ready(function() {
            setInterval(function(){
                $.ajax({
                url: "ajax_admin.php",
                  success: function( result ) {
                $( "#load" ).html(result);
                
              }
            });

             $.ajax({

              url: "select_book_admin.php",
              success: function( result ) {
                $( "#load_ban" ).html(result);
              
              }
            });

            },3000);
});




</script> 