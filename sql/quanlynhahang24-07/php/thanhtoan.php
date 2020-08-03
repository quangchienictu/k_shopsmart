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
  if(isset($_GET['id_banan'])){
    $id = $_GET['id_banan'];

  }else{
    header("admin.php");
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
    <script src="../script/print.min.js"></script>
</head>
<body>
 <?php require("header_admin.php") ?>
 <div class="container mt-5" id="print">
  
  <h2>BÀN : <?=$id?></h2>
  <p class="mt-3">Thời gian : <?= date("H:i:s") ?></p> 
  <p>Ngày : <?= date("d-m-Y") ?></p>
  <p>Người lập hoá đơn : <?=$data['ten_user']?></p>           
  <table class="table table table-hover text-center">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên món</th>
        <th>Số lượng</th>
        <th>Trả lại </th>
         <th>Giá</th>
        <th>Giảm giá</th>
        <th>Thành tiền</th>
      </tr>
    </thead>
    <tbody>
     
        <?php 
            $sql2="SELECT oder_item.* , sp.ten_sp ,oder.id_banan, SUM(oder_item.soluong_sp) as sl,sp.gia_sp,sp.khuyenmai_sp,sp.khuyenmai_sp as tong FROM oder_item,sp,oder WHERE sp.id_sp = oder_item.id_sp and oder.id_banan =$id and oder_item.id_oder = oder.id_oder and oder.trangthai=2  GROUP BY oder_item.id_sp";
             $result2= $conn->query($sql2);
             $i=1;
             $tongtien = 0;
            foreach ($result2 as $item) {
              $gia=number_format($item['gia_sp']);
              $thanhtien = ($item['sl'] * ($item['gia_sp'] - ($item['gia_sp']*$item['khuyenmai_sp']/100)));
              $tongtien+=$thanhtien;
              $thanhtien_fomat=number_format($thanhtien);
              echo "<tr>
                    <td>$i</td>
                    <td>$item[ten_sp]</td>
                    <td id='sl'>$item[sl]</td>
                    <td><input id='tl' type='number' min='0' max='$item[sl]' value='0' style='border:none' class='until'/></td>
                    <td><span id='gia'>$gia</span> đ</td>
                    <td><span id='km'>$item[khuyenmai_sp]</span>%</td>
                    <td><span id='tt' class='sub'>$thanhtien_fomat</span> đ</td>
              </tr>";
              $i++;
            }
            
         ?>
    
    </tbody>
  </table>
  <h4>Tổng tiền : <span id="tongtien"><?=number_format($tongtien)?></span> VNĐ</h4>
  
</div>
<div class="container">
  <a href="admin.php" class="btn btn-danger mt-5">Quay lại Thực đơn</a> 
  <button id="thanhtoan" type="button" class="btn btn-success mt-5" onclick="printJS({ printable: 'print', type: 'html', header: 'HOÁ ĐƠN THANH TOÁN',onPrintDialogClose: function () {
                              push(<?=$id?>); 
                      }})">
                    In hoá đơn
        </button>
</div>
</div>
<script>
     function addCommas(nStr)
    {
      nStr += '';
      x = nStr.split('.');
      x1 = x[0];
      x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
      }
      return x1 + x2;
    }
   function push(id){
    let tongtien = $("#tongtien").text().split(",").join('');
    let id_user = <?php echo $data['id_user']; ?>;
      $.ajax({
            url:'ajax_admin_thanhtoan.php',
            method : 'POST',
            dataType: 'html',
            data: {
             id:id,
             tongtien:tongtien,
             id_user:id_user
            }

          }).done(function(ketqua){
            $('#print').html("Thanh toán thành công!");
            $('#thanhtoan').hide();
          });
    }
    $(".until").change(function(){
       let temp = $(this).parent().parent();
       let sl = temp.children('#sl').text();
       let tl = temp.children().children('#tl').val();
       let gia = temp.children().children('#gia').text().split(",").join('');
       let km = temp.children().children('#km').text();
       let tt = temp.children().children('#tt').text().split(",").join('');
      let tt_update =((sl-tl)*gia)-((sl-tl)*(gia*10/100)); 
      temp.children().children('#tt').html(addCommas(tt_update));

      let tongtien =0;
      $('.sub').each(function(){
        let a=$(this).text().split(",").join('');
          tongtien+=parseInt($(this).text().split(",").join(''));
          console.log(a);
      });

      $("#tongtien").html(addCommas(tongtien));
      
    });
    
</script>
</body>
</html>


