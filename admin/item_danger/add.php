
<div id="insert" class="modal fade modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm sản phẩm </h4>
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