<?php
  if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "delete from account where username = '$id'";
    $result = $conn -> query($sql);
    if ($result) {
      echo "<script type='text/javascript'>alert('Delete success');</script>";
      echo '<meta http-equiv="refresh" content="0">';
    }else{
      echo "<script type='text/javascript'>alert('Delete fail');</script>";
    }
  }
  function user_rows($user_name, $pass, $name, $phone, $address){
    echo "<tr>
            <td>
              $user_name
            </td>
            <td>
              $name
            </td>
            <td>
              $phone
            </td>
            <td>
              $address
            </td>
            <td>
              $pass
            </td>
          </tr>";
  }
?>
<div class="table-responsive">
  <table class="table table-hover">
    <thead class="text-primary">
      <th style="font-size: 15pt">
        Tên đăng nhập
      </th>
      <th style="font-size: 15pt">
        Họ tên
      </th>
      <th style="font-size: 15pt">
        Số điện thoại
      </th>
      <th style="font-size: 15pt">
        Địa chỉ
      </th>
      <th style="font-size: 15pt">
        Mật khẩu
      </th>
    </thead>
    <tbody>
      <?php
        $sql =  "select * from account where type = 1";
        if (isset($_POST['key'])) {
          $key = $_POST['key'];
          $sql = $sql . " and(name like '%$key%' or username like '%$key%')";
        }
        $query = $conn -> query($sql);
        while ($row = $query-> fetch_array()) {
          $username = $row['username'];
          $password = $row['password'];
          $name = $row['name'];
          $phone = $row['phone'];
          $address = $row['address'];
          user_rows($username, $password, $name, $phone, $address);
        }
      ?>
    </tbody>
  </table>
</div>
