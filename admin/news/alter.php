<script language="javascript" src="../admin/ckeditor/ckeditor.js"></script>
<?php
    if (isset($_POST['submit-edit-row'])) {
        $newname = "";
        if ($_FILES['image']['name'] != "") {
            // Lấy tên gốc của file
            $filename = $_FILES['image']['name'];
            $newname = "img/news/" . $filename;
            // Lưu ảnh vào thư mục
            move_uploaded_file($_FILES['image']['tmp_name'], "../".$newname);
        }
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $desc = $_POST['desc'];

        $sql = "UPDATE `news` SET `title`='$title',`desc`='$desc', content='$content' WHERE `id`='$id'";
        if ($newname != "") {
            $sql = "UPDATE `news` SET image='$newname', `title`='$title',`desc`='$desc', content='$content' WHERE `id`='$id'";
        }
        $result = $conn -> query($sql);
        if ($result == '') {
            echo "<script type='text/javascript'>alert('Update fail');</script>";
        }else{
            echo "<script type='text/javascript'>alert('Update success');</script>";
            echo '<meta http-equiv="refresh" content="0">';
        }
    }
?>
<div id="update-row" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="width: 200%; margin-left: -50%;">
            <div class="modal-header">
                <h4 class="modal-title">Sửa Tin Tức</h4>
            </div>
            <div class="modal-body">
            	<?php
						if(isset($_POST['edit'])){
							$id = $_POST['edit'];
							$sql = "select * from news where id = '$id'";
							$query = $conn -> query($sql);
							$row = $query -> fetch_array();
				?>
                <form id="fr-add-alphabet" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                        <label>Mã Tin tức</label> <input
                            type="text" class="form-control add-control" value="<?php echo $row['id'];?>" name="id" readonly required>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label> <input
                            type="text" maxlength="100" class="form-control add-control" value="<?php echo $row['title'];?>" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <br/>
                        <textarea name="desc" maxlength="200" class="form-control add-control" required rows="3"><?php echo $row['desc'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <br/>
                        <textarea name="content"  id="desc-edit"><?php echo $row['content'];?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('desc-edit'); </script>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                    </div>
                    <input accept="image/*" type="file" name="image"/>
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