<?php
include 'header.php';
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    unset($carts[$index]);
    $_SESSION['carts-local'] = array_values($carts);
    echo "<script type='text/javascript'>alert('Xoá thành công');</script>";
    echo "<script>location.href='cart-detail.php';</script>";
}else if (isset($_POST['update'])) {
    for($i = 0; $i < count($carts); $i++) {
        $id = $carts[$i][0][0];
        $size = $carts[$i][0][2];
        $qty = $_POST['qty-'.$id.$size];
        $carts[$i][0][1] = $qty;
        $_SESSION['carts-local'] = $carts;
    }
    echo "<script type='text/javascript'>alert('Cập nhập số lượng thành công');</script>";
    echo "<script>location.href='cart-detail.php';</script>";
}else if (isset($_POST['checkout'])) {
    if (count($carts) <= 0) {
        echo "<script type='text/javascript'>alert('Không có hàng đặt');</script>";
    }else{
        if (!isset($_SESSION['user-username'])) {
            echo "<script type='text/javascript'>alert('Bạn phải đăng nhập trước');</script>";
            echo "<script>location.href='login.php';</script>";
            return;
        }
        $username = $_SESSION['user-username'];
        $sql = "INSERT INTO `cart`(`status`,username) VALUES ( 0, '$username')";
        $query = $conn -> query($sql);
        if ($query) {
            for($i = 0; $i < count($carts); $i++) {
                $id = $carts[$i][0][0];
                $count = $carts[$i][0][1];
                $size = $carts[$i][0][2];
                $sql_1 = "SELECT * FROM `item` WHERE id = $id";
                $query_1 = $conn->query($sql_1);
                $data = $query_1->fetch_assoc();
                if($data['quantity']<$count){
                    $_SESSION['alert'] ="<div class='alert alert-danger alert-dismissible fade show'>
                              <strong>Mặt hàng không đủ!</strong> Sản phẩm $data[name] không đủ số lượng hàng vui lòng đặt hàng nhiều nhất  $data[quantity] sản phẩm
                            </div>";
                    break;
                }else{
                    $sql = "INSERT INTO `cart_detail`(`id_cart`, `id_item`, `count`, `price`, size) VALUES ((select id from cart order by id desc limit 1),$id,$count,((select price from item where id = $id) * $count), '$size')";
                     $query = $conn -> query($sql);
                     $sl = $data['quantity']-$count;
                     $sql_2 = "UPDATE `item` SET `quantity`=$sl WHERE id=$id";
                     $query_2 = $conn -> query($sql_2);
                      echo "<script type='text/javascript'>alert('Đặt hàng thành công');</script>";
                        echo "<script>location.href='history.php';</script>";
                        unset($_SESSION['carts-local']);
                }
            
               /* */

            }
          
          /*  */
          
        }else{
            echo "<script type='text/javascript'>alert('Đặt hàng thất bại');</script>";
        }
    }
}
?>
<div class="product-cart-area pt-120 pb-130">
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <?php if(isset($_SESSION['alert'])) {echo $_SESSION['alert'];unset($_SESSION['alert']);}?>
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Hình ảnh</th>
                                    <th class="product-price">Tên xe</th>
                                    <th class="product-name">Size</th>
                                    <th class="product-name">Đơn giá</th>
                                    <th class="product-price">Số lượng</th>
                                    <th class="product-quantity">Tổng tiền/ Ngày</th>
                                    <th class="product-subtotal">Xoá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                for($i = 0; $i < count($carts); $i++) {
                                    $id = $carts[$i][0][0];
                                    $count = $carts[$i][0][1];
                                    $size = $carts[$i][0][2];
                                    $sql = "select *,(select url from image where id_item = a.id limit 1) as image from item a where id =$id";
                                    $query = $conn->query($sql);
                                    $row = $query->fetch_array();
                                    $money = $row['price'] * $count;
                                    $total = $total + $money;
                                    ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="item-details.php?id=<?php echo $id?>"><img width="120" height="150" src="<?php echo $row['image']?>" alt=""></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="item-details.php?id=<?php echo $id?>"><?php echo $row['name']?></a>
                                        </td>
                                        <td class="product-price"><span class="amount"><center><?php echo $size ?></center></span></td>
                                        <td class="product-price"><span class="amount"><?php echo formatPrice($row['price'])?></span></td>
                                        <td class="product-quantity">
                                            <div class="quantity-range">
                                                <input class="input-text qty text" type="number" step="1" min="0" value="<?php echo $count?>" title="Qty" name="qty-<?php echo $id.$size?>" size="4">
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><?php echo formatPrice($money)?></td>
                                        <td class="product-cart-icon product-subtotal"><a href="?index=<?php echo $i?>" onclick="return confirm('Do you want to delete?')"><i class="ti-trash"></i></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-shiping-update">
                        <div class="cart-shipping">
                        </div>
                        <div class="update-checkout-cart">
                            <div class="update-cart">
                                <button type="submit" name="update" class="btn-style cr-btn"><span>Sửa</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
             
            </div>
            <div class="cart-shiping-update">
                <div class="cart-shipping">
                </div>
                <div class="update-checkout-cart">
                    <div class="update-cart">
                        <button type="submit" class="btn-style cr-btn" name="checkout">
                            <span>Đặt hàng</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
</div>
</div>
<?php
include 'footer.php';
?>