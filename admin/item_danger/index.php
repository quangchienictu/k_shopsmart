<script language="javascript" src="../admin/ckeditor/ckeditor.js"></script>
<?php
  
  function render_row($row){
    $id = $row['id'];
    $image = $row['image'];
    $name = $row['name'];
    $producer = $row['producer'];
    $price = $row['price'];
    $group = $row['group_name'];
    $quantity= $row['quantity'];
    echo "<tr>
            <td style=width:150px>
              <img  width=100 height=100 src='../$image'>
            </td>
            <td>
              $name
            </td>
           
           
            <td>
              $quantity
            </td>
            <td>
              <form method='post'>
                <button type='submit'  class='btn-control' name='edit' value='$id'><i class='fa fa-cart-plus'></i></button>
            </form>
            </td>
          </tr>";
  }
?>
<div class="table-responsive">
  <table class="table">
    <thead class="text-primary">
      <th style="font-size: 15pt;">
        Hình ảnh
      </th>
      <th style="font-size: 15pt;">
        Tên sản phẩm
      </th>
    
     
       <th style="font-size: 15pt">
        Số lượng 
      </th>
      <th style="font-size: 15pt" >Nhập hàng</th>
    </thead>
    <tbody>
      <?php
        $key = '';
        if (isset($_POST['key'])) {
          $key = $_POST['key'];
        }
        $sql =  "SELECT a.*, (SELECT url from image where id_item = a.id limit 1) as image, b.name as group_name FROM `item` a inner join `group` b  on a.id_group = b.id where a.name  like '%$key%' ";
        $query = $conn -> query($sql);
        while ($row = $query-> fetch_array()) {
          render_row($row);
        }
      ?>
    </tbody>
  </table>
</div>
<?php
  include("add.php");
  include("alter.php");
?>