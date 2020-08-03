
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
<?php require("header_admin.php") ?>

<body class="sb-nav-fixed">
  <!-- <div class="loader">
      <img src="../image/load.gif">
  </div> -->
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <h1 class="mt-4">Thống kê doanh thu</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Thống kê doanh thu theo ngày / tháng / năm </li>
          </ol>
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">Doanh thu ngày <?=date("d-m-Y");?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                  <?php 
                  $sql="SELECT SUM(oder.tongtien) as tongtien FROM oder WHERE DAY(`time_end`) = DAY(CURDATE()) AND  MONTH(`time_end`) = MONTH(CURDATE()) AND trangthai =3";
                  $result = $conn->query($sql);
                  $data = $result->fetch_assoc();
                  $ngay = number_format($data['tongtien']);
                  echo '<a class="small text-white stretched-link" href="#">'.$ngay .' đ </a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-warning text-white mb-4">
                <div class="card-body"> Doanh thu Tháng <?=date("m-Y");?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <?php 
                  $sql2="SELECT SUM(oder.tongtien) as tongtien FROM oder WHERE MONTH(`time_end`) = MONTH(CURDATE()) AND trangthai =3";
                  $result2 = $conn->query($sql2);
                  $data2 = $result2->fetch_assoc();
                  $thang = number_format($data2['tongtien']);
                  echo '<a class="small text-white stretched-link" href="#">'.$thang .' đ </a>';
                
                  ?>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                <div class="card-body">Doanh thu Năm <?=date("Y");?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <?php 
                  $sql3="SELECT SUM(oder.tongtien) as tongtien FROM oder WHERE YEAR(`time_end`) = YEAR(CURDATE()) AND trangthai =3";
                  $result3 = $conn->query($sql3);
                  $data3 = $result3->fetch_assoc();
                  $nam = number_format($data3['tongtien']);
                  echo '<a class="small text-white stretched-link" href="#">'.$nam .' đ </a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-danger text-white mb-4">
                <div class="card-body">Tổng Doanh thu:</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                 <?php 
                 $sql4="SELECT SUM(oder.tongtien) as tongtien FROM oder WHERE trangthai =3";
                 $result4 = $conn->query($sql4);
                 $data4 = $result4->fetch_assoc();
                 $nam = number_format($data4['tongtien']);
                 echo '<a class="small text-white stretched-link" href="#">'.$nam .' đ </a>';
                 ?>
               </div>
             </div>
           </div>
         </div>
         <div class="card mb-4 m-3">
          <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê năm : <input id="click" type="number" placeholder="YYYY" min="2017" max="2100" value="<?=date("Y");?>"> </div>
          <div class="card-body">
            <div class="table-responsive" id="data">            
              <table class="table table-hover text-center">
                <thead>
                  <tr>
                    <th>Tháng</th>
                    <th>Doanh thu</th>
                    <th style="max-width: 100px;">Tỉ lệ doanh thu theo năm </th>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i=1;$i<(int)date("m")+1;$i++){ ?>
                    <tr>
                      <th>Tháng <?=$i?></th>
                      <?php 
                         $sql5="SELECT SUM(oder.tongtien) as tongtien FROM oder WHERE trangthai =3  and MONTH(`time_end`) = $i and Year(time_end) =2020";
                         $result5 = $conn->query($sql5);
                         $data5 = $result5->fetch_assoc();
                         $thang_all = number_format($data5['tongtien']);
                         $tile = ($data5['tongtien']/$data4['tongtien']) * 100;
                       ?>
                      <th><?=$thang_all?> đ</th>
                      
                      <th><?=round($tile,2)?>%</th>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

            <div class="card mb-4 m-3">
          <div class="card-header"><i class="fas fa-table mr-1"></i>Thống theo admin </div>
          <div class="card-body">
            <div class="table-responsive">            
              <table class="table table-hover text-center">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên Admin</th>
                    <th>Tổng thu</th>
                   <th>Tỉ lệ</th>
                  </tr>
                </thead>
                <tbody>
               
                      <?php 
                         $sql6="SELECT SUM(oder.tongtien) as tongtien ,user.id_user,user.ten_user,user.sdt_user FROM oder,user WHERE trangthai =3 AND user.id_user = oder.id_user  GROUP BY oder.id_user";
                         $result6 = $conn->query($sql6);
                       ?>
                      <?php foreach ($result6 as $key => $value):?>
                       <?php  $tile = ($value['tongtien']/$data4['tongtien'])* 100;?>
                         <tr>
                     
                         <th><?=$value['id_user']?></th>        
                          <th><?=$value['ten_user']?></th>        
                          <th><?=number_format($value['tongtien'])?></th>
                           <th><?=round($tile,2)?> %</th> 
                        </tr>
                      <?php endforeach ?>
                   
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>

  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#click').change(function(){
        var value = $("#click").val();
         $.ajax({
            url:'static/ajax_admin_thongkenam.php',
            method : 'POST',
            dataType: 'html',
            data: {
             value:value,
            }
          }).done(function(ketqua){
            $("#data").html(ketqua);
          });
      })
  });
</script>
</body>
</html>