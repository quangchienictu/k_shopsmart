<?php
if (isset($_POST['submit-edit-row'])) {
    $quantity = $_POST['quantity'];
    $id=$_POST['id'];
    $quantity_default = $_POST['quantity_default'];

    $qt = $quantity_default+$quantity;


    $sql = "UPDATE `item` SET quantity = $qt WHERE id = $id";
    $result = $conn -> query($sql);
    if ($result == '') {
        echo "<script type='text/javascript'>alert('Update fail');</script>";
    }else{
        
        
       /* echo "<script type='text/javascript'>alert('Update success');</script>";*/
        echo '<meta http-equiv="refresh" content="0">';
    }
}
?>

<div id="update-row" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nhập thêm sản phẩm</h4>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                   <?php
                   if(isset($_POST['edit'])){
                       $id = $_POST['edit'];
                       $sql = "select * from item where id = '$id'";
                       $query = $conn -> query($sql);
                       $row = $query -> fetch_array();
                       
                       ?>

                    <div class="form-group">
                        <label>Mã sản phẩm</label> <input
                        type="text" maxlength="100" class="form-control add-control" value="<?php echo $id?>" name="id" readOnly>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label> <input
                        type="text" maxlength="100" class="form-control add-control" value="<?php echo $row['name']?>" name="name" required readOnly>
                    </div>
                     <div class="form-group">
                        <label>Số lượng còn trong kho</label> <input
                        type="text" maxlength="100" class="form-control add-control" value="<?php echo $row['quantity']?>" name="quantity_default" required readOnly>
                    </div>
                    <div class="form-group">
                        <label>Số lượng nhập thêm</label>
                        <br/>
                        <input type="number" class="form-control add-control" value="0" required name="quantity">
                    </div>
                  
                

                    <div class="form-group" style="text-align: right;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <input type="submit" class="btn btn-primary" name="submit-edit-row" value="Xác nhận"/>
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