<script language="javascript" src="../admin/ckeditor/ckeditor.js"></script>
<?php
    if (isset($_POST['add-row'])) {
        $newname = "";
        if (isset($_FILES['image'])) {
            // Lấy tên gốc của file
            $filename = $_FILES['image']['name'];
            $newname = "img/news/" . $filename;
            // Lưu ảnh vào thư mục
            move_uploaded_file($_FILES['image']['tmp_name'], "../".$newname);
        }
        $title = $_POST['title'];
        $content = $_POST['content'];
        $desc = $_POST['desc'];
        $pub_date = getCurrentDate();
        $sql = "INSERT INTO `news`(`title`, `desc`, content, `pub_date`, image) VALUES ('$title','$desc','$content', '$pub_date', '$newname')";
        $result = $conn -> query($sql);
        if ($result == '') {
            echo "<script type='text/javascript'>alert('Insert fail');</script>";
        }else{
            echo "<script type='text/javascript'>alert('Insert success');</script>";
            echo '<meta http-equiv="refresh" content="0">';
        }
    }
?>
<div id="insert" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="width: 200%; margin-left: -50%;">
            <div class="modal-header">
                <h4 class="modal-title">Thêm Tin Tức</h4>
            </div>
            <div class="modal-body">
                <form id="fr-add-alphabet" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tiêu đề</label> <input
                            type="text" maxlength="100" class="form-control add-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <br/>
                        <textarea maxlength="200" class="form-control add-control" rows="3" required name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <br/>
                        <textarea name="content"  id="content"></textarea>
                        <script type="text/javascript">CKEDITOR.replace('content'); </script>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                    </div>
                    <input accept="image/*" type="file" name="image" required />
                    <div class="form-group" style="text-align: right;">
                        <input type="submit" class="btn btn-primary" name="add-row" value="Ok"/>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>