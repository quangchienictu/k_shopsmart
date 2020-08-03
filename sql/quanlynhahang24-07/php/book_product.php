<?php
require("session_user.php");
if(isset($_SESSION['login_user'])){
  $sql2="SELECT * FROM user where sdt_user = ".$_SESSION['login_user'];
  $result2 = $conn->query($sql2);
  $data = $result2->fetch_assoc();
  if($data['quyen_user']==1){
    
  }else{
     header('Location:admin.php');
 }
}else{
 header("location: login.php");
}


if(isset($_GET["id_ban"])){
  $id_ban =$_GET['id_ban'];
  $sql1="SELECT * FROM banan WHERE id_banan=$id_ban";
  $result1=mysqli_query($conn,$sql1);
  if($row1=mysqli_fetch_assoc($result1)){
    $ten_ban=$row1["ten_banan"];
  }

}else{
 header("location: check_book.php");
}
$uri = $_SERVER['REQUEST_URI'];
$uri2=substr( $uri,  0, strpos($uri,"&"));
$url=$uri2==false?$uri:$uri2;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang gọi món</title>
  <?php  require("../css/style.php")?>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/header_user.css">
  <!-- <link rel="stylesheet" href="../css/index.css"> -->
  <link rel="stylesheet" href="../css/book_product.css">

</head>
<body  data-spy="scroll" data-target=".navbar" data-offset="50">

  <div class="header">
    <?php require("header_user.php") ?>
  </div>
  <div class="row " style="margin-top: 10px; padding: 10px">
    <div class="col-lg-6 croll-oder" >
      <div class="list-menu">

      <h4 style="text-align:center; color: #bd0046;">DANH SÁCH MÓN <span style="text-transform:uppercase;"><?php echo $ten_ban ;?><span></h4>
        <form action="<?=$url?>" method="post">
          <table class="table table-bordered">
            <thead class="thead-purple">
              <tr>
                <th style="width:400px;text-align:center;">Tên món ăn</th>
                <th style="text-align:center;">Số lượng</th>
                <th style="text-align:center;">Xóa</th>
              </tr>
            </thead>
            <tbody>
              <?php 




              $action = !empty($_GET['action']) ? $_GET['action'] : 'index';
                                    // select id data
              if(isset($_GET['id'])){
                if(!isset($_GET['action'])){
                 $action = 'them-moi';
               }
               $id_sp =$_GET['id'];
               $sql = "SELECT * FROM sp WHERE id_sp= $id_sp";
               $result = mysqli_query($conn,$sql); 

               if($row =mysqli_fetch_array($result)){
                $id_sp=$row['id_sp'];
                $ten_sp = $row['ten_sp'];

              }
            }
            switch ($action) {
              case 'them-moi':
              if(isset($_SESSION['cart'][$id_sp])){
                $_SESSION['cart'][$id_sp]['soluong'] +=1;
              }else{
                $item=[
                  "id_sp" => $row["id_sp"],
                  "ten_sp" => $row["ten_sp"],
                  "soluong" => 1,
                ];

                $_SESSION['cart'][$id_sp] =$item;
              }
              break;
              case 'tru-mon':
              if(isset($_SESSION['cart'][$id_sp])){
                if(($_SESSION['cart'][$id_sp]['soluong']>1)){
                  $_SESSION['cart'][$id_sp]['soluong'] -=1;
                }else{
                 unset($_SESSION['cart'][$id_sp]);
               }
             }
             break;
             case 'xoa':
             if(isset($_SESSION['cart'][$id_sp])){
               unset($_SESSION['cart'][$id_sp]);
             }
             break;
             case 'xoa-het':

             if(isset($_SESSION['cart'])){
               unset($_SESSION['cart']);
             }

             break;
             case 'gui':
             $carts=isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
             $id_banan = $_GET['id_ban'];
             $id_user = $data['id_user'];
             $tongtien = 0;
             if(count($carts)){
               foreach ($carts as $value) {
                $sql4 = "SELECT * FROM sp where id_sp = $value[id_sp]";

                $result4 = $conn->query($sql4);
                $data4 = $result4->fetch_assoc();
                $temp = $value['soluong']*($data4['gia_sp']- ($data4['gia_sp'] *($data4['khuyenmai_sp']/100)));
                $tongtien += $temp ;
              }
              $sql5="INSERT INTO `oder`(`id_banan`, `id_user`, `tongtien`, `trangthai`) VALUES ($id_banan,$id_user,$tongtien,1)";
              $conn->query($sql5);

              $sql6="SELECT Max(`id_oder`) as id_order FROM `oder`";
              $result6 = $conn->query($sql6)->fetch_assoc();
              $id_order = $result6['id_order'];

              foreach ($carts as $value) {
                $sql7="INSERT INTO `oder_item`(`id_oder`, `soluong_sp`, `id_sp`) VALUES ($id_order,$value[soluong],$value[id_sp])";
                $conn->query($sql7);
              }

              unset($_SESSION['cart']);
              $_SESSION['alert'] = "Gửi thực đơn thành công !";
            }else{
              echo '<script type="text/javascript">alert("Vui lòng chọn ít nhất 1 món ")</script>';
            }

            break;

            default:
                                            # code...
            break;
          }
                                      $carts=isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                                      foreach($carts as $key => $cart) :
                                        ?>
                                        <tr>
                                          <td style="width:30%;text-align:center;" ><span><?php echo $cart['ten_sp']?></span></td>
                                          <td style="text-align:center; display: flex; justify-content: center;">
                                            <div class="number-input md-number-input">
                                              <button onclick="x(-1,<?=$cart['id_sp']?>);" type="button" class="minus"></button>
                                              <input value="<?php echo $cart['soluong'] ?>" type="number">
                                              <!--  onclick="this.parentNode.querySelector('input[type=number]').stepUp()" -->
                                              <button type="button" onclick="x(1,<?=$cart['id_sp']?>)" class="plus" id="add"></button>
                                            </div>
                                          </td>
                                          <td style="text-align:center;"><a href="<?=$url?>&id=<?php echo $cart['id_sp']; ?>&action=xoa">xóa</a></td>
                                        </tr>

                                      <?php  endforeach; ?>
                                    </tbody>
                                  </table>
                                  <div class="book__product-btn">
                                    <div><a href="<?=$url?>&action=gui" class=" btn btn-success" style='margin-right: 50px; ' > Gửi thực đơn</a></div>   
                                    <div><a href="<?=$url?>&action=xoa-het" class=" btn btn-danger" style=' ' > Xóa Tất Cả</a></div>                         
                                  </div>

                                </form>

                                <b style="color: green;font-size: 23px;"><?php if(isset($_SESSION['alert'])){echo $_SESSION['alert'];unset($_SESSION['alert']);}?></b>
                                <?php 

                                ?>
                                <!-- insert product -->
                              </div>
                            </div>
                          </body>
                          </html>
                          <div class="col-lg-6 croll">
      <!-- body product -->
      <div class="list-item list-menu">
        <?php require("product.php") ?> 
      </div>

    </div>

                          <script type="text/javascript">
                            x=(number,id,url)=>{
                             if(number==1){
                              let url = "<?php echo "$url"; ?>" + "&id="+id;
                              window.location.assign(url);
                            }
                            if(number==-1){
                              let url = "<?php echo "$url"; ?>" + "&id="+id+"&action=tru-mon";
                              window.location.assign(url);

                            }
                          }
                        </script>
    </div>
</div>


