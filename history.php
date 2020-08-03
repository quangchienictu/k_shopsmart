<?php
include 'header.php';
function render_row($row){
    $image = $row['image'];
    $name = $row['name'];
    $price = formatPrice($row['price']);
    $count = $row['count'];
    $size = $row['size'];
    echo "<tr>
    <td style=width:150px>
    <img  width=100 height=100 src='$image'>
    </td>
    <td>
    $name
    </td>
    <td>
    $size
    </td>
    <td>
    $count
    </td>
    <td>
    $price
    </td>
    </tr>";
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE cart set status = -1 where id = $id";
    $query = $conn -> query($sql);
    if ($query) {
        echo "<script type='text/javascript'>alert('Huỷ thành công');</script>";
    }else{
        echo "<script type='text/javascript'>alert('Huỷ thất bại');</script>";
    }
}
?>
<div class="product-cart-area pt-120 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-content table-responsive">

                    <?php
                    $username = $_SESSION['user-username'];
                    $sql = "SELECT * FROM cart WHERE username = '$username' order by id desc";
                    $query = $conn -> query($sql);
                    while ($row = $query -> fetch_array()) {
                        ?>
                        <div class="product-width col-md-12 col-xl-12 col-lg-12">
                            <div class="product-wrapper mb-35" style="padding: 10px;">
                                <h3>Ngày đặt: <?php echo $row['order_date']?></h3>
                                <span style="color: red">Trạng thái: <?php echo getStatus($row['status'])?></span>
                                <br/>
                                <?php
                                if ($row['status'] == 0) {
                                    ?>
                                    <a class="btn-style cr-btn" href="?id=<?php echo $row['id']?>" onclick="return confirm('Bạn muốn huỷ đặt xe?')">Huỷ đặt</a>
                                    <?php
                                }
                                ?>
                                <div class="table-responsive" style="margin-top: 20px">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th style="font-size: 15pt;">
                                                Hình ảnh
                                            </th>
                                            <th style="font-size: 15pt;">
                                                Sản phầm
                                            </th>
                                            <th style="font-size: 15pt">
                                                Size
                                            </th>
                                            <th style="font-size: 15pt">
                                                Số lượng
                                            </th>
                                            <th style="font-size: 15pt;">
                                                Tổng tiền
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql =  "SELECT a.*, b.name, (select url from image where id_item = b.id limit 1) as image from cart_detail a inner join item b on a.id_item = b.id where id_cart = ".$row['id'];
                                            $query1 = $conn -> query($sql);
                                            while ($row1 = $query1-> fetch_array()) {
                                                render_row($row1);
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>