
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
<!-- <div class="loader">
  <img src="../image/load.gif">
</div> -->
<body class="sb-nav-fixed">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <h1 class="mt-4">Quản lý hoá đơn</h1>
          <ol class="breadcrumb mb-4">
         
          </ol>   
        </div>
        <div class="card mb-4 m-3">
          <div class="card-header"><i class="fas fa-table mr-1"></i>Danh sách hoá đơn </div>
          <div class="card-body">

            <div class="search float-left mr-5">
              <label>Tìm kiếm theo ngày :</label>
              <input id="date" class="form-control"  type="date" name="" style="width: 200px;display: inline;">
            </div>
           
            <div class="search float-left mr-5">
              <label>Tìm kiếm theo tháng :</label>
              <select id="month" class="form-control" style="width: 200px;display: inline;" id="sel1">
                <option value="all" selected="">Tất cả</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </div>
             <div class="search float-right mr-5">
              <button id="tatca" class="btn btn-primary">Tất cả </button>
            </div>
            <div class="table-responsive mt-5">            
              <table class="table table table-hover text-center">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>ID hoá đơn</th>
                    <th >Bàn</th>
                    <th >Tổng tiền</th>
                    <th >Thời gian bắt đầu</th>
                    <th >Thời gian kết thúc</th>
                    <th>Người lập hoá đơn</th>
                  </tr>
                </thead>
                <tbody id="load">

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
    


    var load=data=>{
      $.ajax({
        url :"ajax_admin_hoadon.php",
        method:"get",
        dataType:"json",
      }).done(function(data){
        let list='';
        $.each(data,function(key,value){
          list+='<tr>\
          <td>'+(key+1)+'</td>\
          <td>'+value.id_oder+'</td>\
          <td>'+value.id_banan+'</td>\
          <td>'+addCommas(value.tongtien)+'</td>\
          <td>'+value.time_start+'</td>\
          <td>'+value.time_end+'</td>\
          <td>'+value.ten_user+'</td>\
          </tr>';
        });
        $("#load").html(list);
      });
    }

    load();

    $('#date').on("keyup change", function (){
      console.log('ok');
      let date = $('#date').val();
      if(date==''){
       load();
     }else{
       $.ajax({
        url :"search/date.php",
        method:"post",
        data:{date:date},
        dataType:"json",
       }).done(function(data){
           let list='';
        $.each(data,function(key,value){
          list+='<tr>\
          <td>'+(key+1)+'</td>\
          <td>'+value.id_oder+'</td>\
          <td>'+value.id_banan+'</td>\
          <td>'+addCommas(value.tongtien)+'</td>\
          <td>'+value.time_start+'</td>\
          <td>'+value.time_end+'</td>\
          <td>'+value.ten_user+'</td>\
          </tr>';
        });
        $("#load").html(list);
      }).fail(function() {
        let list ="<tr><td colspan='7'>Không có dữ liệu ngày này</td></tr>";
         $("#load").html(list);
      });
    }
  });


      $('#month').on("keyup change", function (){
      let month = $('#month').val();
      if(month=='all'){
       load();
     }else{
       $.ajax({
        url :"search/month.php",
        method:"post",
        data:{month:month},
        dataType:"json",
       }).done(function(data){
           let list='';
        $.each(data,function(key,value){
          list+='<tr>\
          <td>'+(key+1)+'</td>\
          <td>'+value.id_oder+'</td>\
          <td>'+value.id_banan+'</td>\
          <td>'+addCommas(value.tongtien)+'</td>\
          <td>'+value.time_start+'</td>\
          <td>'+value.time_end+'</td>\
          <td>'+value.ten_user+'</td>\
          </tr>';
        });
        $("#load").html(list);
      }).fail(function() {
        let list ="<tr><td colspan='7'>Không có dữ liệu ngày này</td></tr>";
         $("#load").html(list);
      });
    }
  })

    $('#tatca').click(function(){
       $('#month').val("");
        $('#date').val("");
      load();
    });


  });

  
</script>

</body>
</html>
