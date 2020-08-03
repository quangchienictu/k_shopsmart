<?php
if (isset($_POST['submit-edit-row'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $group = $_POST['group'];

    $sql = "UPDATE `item` SET `name`='$name',`producer`='$producer',`price`=$price,`desc`='$desc', id_group = $group WHERE id = $id";
    $result = $conn -> query($sql);
    if ($result == '') {
        echo "<script type='text/javascript'>alert('Update fail');</script>";
    }else{
        if (isset($_FILES['images']))
        {
            $myFile = $_FILES['images'];
            $fileCount = count($myFile["name"]);
            if ($myFile['name'][0]) {
                echo $fileCount;
                $sql = "DELETE FROM image WHERE id_item = $id";
                $conn -> query($sql);
                for ($i = 0; $i < $fileCount; $i++) {
                    $uploadfile = 'img/item/'.$myFile['name'][$i];
                    move_uploaded_file($myFile['tmp_name'][$i], "../".$uploadfile);
                    $sql = "INSERT INTO `image`(`id_item`, `url`) VALUES ($id,'$uploadfile')";
                    $conn->query($sql);
                }
            }
        }
        echo "<script type='text/javascript'>alert('Update success');</script>";
        echo '<meta http-equiv="refresh" content="0">';
    }
}
?>

<div id="update-row" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông tin sản phẩm</h4>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                   <?php
                   if(isset($_POST['edit'])){
                       $id = $_POST['edit'];
                       $sql = "select * from item where id = '$id'";
                       $query = $conn -> query($sql);
                       $row = $query -> fetch_array();
                       $id_group = $row['id_group'];
                       ?>

                       <div class="form-group">
                        <label>Mã sản phẩm</label> <input
                        type="text" maxlength="100" class="form-control add-control" value="<?php echo $id?>" name="id" readOnly>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label> <input
                        type="text" maxlength="100" class="form-control add-control" value="<?php echo $row['name']?>" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Hãng sản xuất</label>
                        <br/>
                        <select class="form-control add-control" style="height: 40px" name="group">
                            <?php
                            $sql = "SELECT * FROM `group`";
                            $query = $conn -> query($sql);
                            while ($row1 = $query -> fetch_array()) {
                                $id = $row1['id'];
                                $name = $row1['name'];
                                $selected = '';
                                if ($id == $id_group) {
                                    $selected = 'selected';
                                }
                                echo "<option $selected value='$id'>$name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <br/>
                        <input type="number" class="form-control add-control" value="<?php echo $row['price']?>" required name="price">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <br/>
                        <textarea name="desc"  id="edit-content"><?php echo $row['desc']?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('edit-content'); </script>
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh</label>
                    </div>
                    <input accept="image/*" type="file" name="images[]" multiple />

                    <div class="form-group" style="text-align: right;">
                        <input type="submit" class="btn btn-primary" name="submit-edit-row" value="Ok"/>
                    </div>
                    <script type="text/javascript">
                      $('#update-row').modal('show');
                  </script>
              </form>
              <?php 
          }
          ?>
      </div>
  </div>

</div>
</div>