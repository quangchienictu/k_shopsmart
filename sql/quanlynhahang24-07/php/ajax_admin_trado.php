
 <?php 
    include('session_user.php');
    include('connect.php');
            $id= $_GET['id'];
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
                    <td>$item[sl]</td>
                    <td>$gia đ</td>
                    <td>$item[khuyenmai_sp]%</td>
                    <td ><span class='thanhtien'>$thanhtien</span> đ</td>
              </tr>";
              $i++;
            }
           
         ?>