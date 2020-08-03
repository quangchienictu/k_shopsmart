 <?php 
require('../connect.php');
  if(isset($_POST['value'])){
    $value =$_POST['value'];
  }else{
    $value=1;
  }

   $sql4="SELECT SUM(oder.tongtien) as tongtien FROM oder WHERE trangthai =3";
                 $result4 = $conn->query($sql4);
                 $data4 = $result4->fetch_assoc();

  ?>
  <?php if($value==2020):?>
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
                         $sql5="SELECT SUM(oder.tongtien) as tongtien FROM oder WHERE trangthai =3 and MONTH(`time_end`) = $i and Year(time_end) =$value";
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
  <?php endif ?>
    <?php if($value>2020||$value<2020):?>
 <table class="table table-hover text-center">
                <thead>
                  <tr>
                    <th>Tháng</th>
                    <th>Doanh thu</th>
                    <th style="max-width: 100px;">Tỉ lệ doanh thu theo năm </th>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i=1;$i<13;$i++){ ?>
                    <tr>
                      <th>Tháng <?=$i?></th>
                      <?php 
                         $sql5="SELECT SUM(oder.tongtien) as tongtien FROM oder WHERE trangthai =3 and MONTH(`time_end`) = $i and Year(time_end) =$value";
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
  <?php endif ?>