<?php
  if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "delete from local where id = '$id'";
    $result = $conn -> query($sql);
    if ($result) {
      echo "<script type='text/javascript'>alert('Delete success');</script>";
      echo '<meta http-equiv="refresh" content="0">';
    }else{
      echo "<script type='text/javascript'>alert('Delete fail');</script>";
    }
  }
  function user_rows($id, $name){
    echo "<tr>
            <td>
              $name
            </td>
            <td>
              <form method='post'>
                <button type='submit' class='btn-control' class='btn-control' name='edit' value='$id'><i class='fa fa-edit'></i></button>
                <button type='submit' class='btn-control' class='btn-control' name='delete' value='$id'><i class='fa fa-trash'></i></button>
            </form>
            </td>
          </tr>";
  }
?>
<div class="table-responsive">
  <table class="table table-hover">
    <thead class="text-primary">
      <th style="font-size: 15pt">
        Tên địa phương
      </th>
      <th width="100px"></th>
    </thead>
    <tbody>
      <?php
        $sql =  "select * from local";
        if (isset($_POST['key'])) {
          $key = $_POST['key'];
          $sql = $sql . " where (name like '%$key%')";
        }
        $query = $conn -> query($sql);
        while ($row = $query-> fetch_array()) {
          $id = $row['id'];
          $name = $row['name'];
          user_rows($id, $name);
        }
      ?>
    </tbody>
  </table>
</div>
<?php
  include("add.php");
  include("alter.php");
?>