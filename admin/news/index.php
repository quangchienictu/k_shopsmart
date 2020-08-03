<?php
  if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "delete from news where id = '$id'";
    $result = $conn -> query($sql);
    if ($result) {
      echo "<script type='text/javascript'>alert('Delete success');</script>";
      echo '<meta http-equiv="refresh" content="0">';
    }else{
      echo "<script type='text/javascript'>alert('Delete fail');</script>";
    }
  }
  function render_row($row){
    $id = $row['id'];
    $title = $row['title'];
    $pub_date = $row['pub_date'];
    $image = $row['image'];
    echo "<tr>
            <td style=width:100px>
              <img  width=100 height=100 src='../$image'>
            </td>
            <td>
              $title
            </td>
            <td>
              $pub_date
            </td>
            <td>
              <form method='post'>
                <button type='submit' class='btn-control' name='edit' value='$id'><i class='fa fa-edit'></i></button>
                <button type='submit' class='btn-control' name='delete' value='$id'><i class='fa fa-trash'></i></button>
            </form>
            </td>
          </tr>";
  }
?>
<div class="table-responsive">
  <table class="table">
    <thead class="text-primary">
      <th width="200px" style="font-size: 15pt; width: 200px">
        Hình ảnh
      </th>
      <th style="font-size: 15pt">
        Tiêu đề
      </th>
      <th style="font-size: 15pt">
        Ngày tạo
      </th>
      <th width="100px"></th>
    </thead>
    <tbody>
      <?php
        $key = '';
        if (isset($_POST['key'])) {
          $key = $_POST['key'];
        }
        $sql =  "SELECT * FROM `news` where title like '%$key%'";
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