<?php
if (isset($_POST['add-row'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $group = $_POST['group'];
    
    $sql = "INSERT INTO `item`(`name`, `desc`, producer, `price`, id_group) VALUES ('$name','$desc','$producer', '$price',$group)";
    $result = $conn -> query($sql);
    if ($result == '') {
        echo "<script type='text/javascript'>alert('Insert fail');</script>";
    }else{
        $sql = "SELECT id FROM item order by id desc limit 1";
        $query = $conn -> query($sql);
        $row = $query -> fetch_array();
        $id = $row['id'];
        if (isset($_FILES['images']))
        {
            $myFile = $_FILES['images'];
            $fileCount = count($myFile["name"]);
            for ($i = 0; $i < $fileCount; $i++) {
                $uploadfile = 'img/item/'.$myFile['name'][$i];
                move_uploaded_file($myFile['tmp_name'][$i], "../".$uploadfile);
                $sql = "INSERT INTO `image`(`id_item`, `url`) VALUES ($id,'$uploadfile')";
                $conn->query($sql);
            }
        }
        echo "<script type='text/javascript'>alert('Insert success');</script>";
        echo '<meta http-equiv="refresh" content="0">';
    }
}
?>
<div id="insert" class="modal fade modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm sản phẩm 22sdsdsdsdsds</h4>
            </div>
            <div class="modal-body">
                <form id="fr-add-alphabet" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên sản phẩm</label> <input
                        type="text" maxlength="100" class="form-control add-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Hãng sản xuất</label>
                        <br/>
                        <select class="form-control add-control" style="height: 40px" name="group">
                            <?php
                                $sql = "SELECT * FROM `group`";
                                $query = $conn -> query($sql);
                                while ($row = $query -> fetch_array()) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    echo "<option value='$id'>$name</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <br/>
                        <input type="number" class="form-control add-control" required name="price">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <br/>
                        <textarea name="desc"  id="content"></textarea>
                        <script type="text/javascript">CKEDITOR.replace('content'); </script>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                    </div>
                    <input accept="image/*" type="file" name="images[]" multiple required />
                    <div class="form-group" style="text-align: right;">
                        <input type="submit" class="btn btn-primary" name="add-row" value="Ok"/>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>