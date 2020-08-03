<?php
    session_start();
    require("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang gọi món</title>
        <?php  require("../css/style.php")?>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header_user.css">
        <!-- <link rel="stylesheet" href="../css/index.css"> -->
        <link rel="stylesheet" href="../css/book_product.css">

    </head>
    <body  data-spy="scroll" data-target=".navbar" data-offset="50">
            
            <div class="header">
                <?php require("header_user.php") ?>
            </div>
            <div class="row " style="margin-top:100px;">
                <div class="col-lg-6 croll">
                    <!-- body product -->
                    <?php require("product.php") ?> 
                </div>
                <div class="col-lg-6" >
                        <h2>HÓA ĐƠN</h2>
                        <form action="" method="post">
                            <table class="table table-bordered">
                                <thead class="thead-purple">
                                    <tr>
                                        <th style="width:100px;">tên món ăn</th>
                                        <th>số lượng</th>
                                        <th>xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // select id data
                                    if(isset($_GET['id'])){
                                    $id_sp =$_GET['id'];
                                    $sql = "SELECT * FROM sp WHERE id_sp= $id_sp";
                                    $result = mysqli_query($conn,$sql); 
                                    $action = !empty($_GET['action']) ? $_GET['action'] : 'them-moi';
                                    if($row =mysqli_fetch_array($result)){
                                        $id_sp=$row['id_sp'];
                                        $ten_sp = $row['ten_sp'];
                                        
                                    }
                                    // thêm mới vào giỏ hàng
                                    if($action =='them-moi'){
                                        if(isset($_SESSION['cart'][$id_sp])){
                                            $_SESSION['cart'][$id_sp]['soluong'] +=1;
                                        }else{
                                        $item=[
                                            "id_sp" => $row["id_sp"],
                                            "ten_sp" => $row["ten_sp"],
                                            "soluong" => 1,
                                        ];
                                        
                                        $_SESSION['cart'][$id_sp] =$item;
                                        }
                                    }
                                    // xóa sản phẩm khỏi giỏ hàng
                                    if($action =='xoa'){
                                        if(isset($_SESSION['cart'][$id_sp])){
                                            unset($_SESSION['cart'][$id_sp]);
                                        }
                                    }
                                    //xóa hết tất cả sản phẩm khỏi giỏ hàng
                                    if($action =='xoa-het'){
                                        if(isset($_SESSION['cart'])){
                                            unset($_SESSION['cart']);
                                        }
                                    }
                                
                                    //
                                    $carts=isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                                        foreach($carts as $key => $cart) :
                                    ?>
                                    <tr>
                                        <td style="width:30%;"><?php echo $cart['ten_sp']?></td>
                                        <td style="width:20%;">
                                            <div class="number-input md-number-input">
                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(1)" class="minus"></button>
                                            <input class="quantity" min="1" name="quantity" value="<?php echo $cart['soluong'] ?>" type="number">
                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                        </td>
                                        <td><a href="book_product.php?id=<?php echo $cart['id_sp']; ?>&action=xoa">xóa</a></td>
                                    </tr>
                                    <?php endforeach; }?>
                                </tbody>
                            </table>
                            <div class="book__product-btn">
                                <div><input type="submit" class='btn btn-success' style=' margin-right:30px;' value="Gửi Thực Đơn"></div>
                                <div><input type="submit" class='btn btn-success' style=' margin-right:30px;' value="Tạo Hóa Đơn"></div>
                                <div><a href="book_product.php?&action=xoa-het" class=" btn btn-danger" style=' ' > Xóa Tất Cả</a></div>                         
                            </div>

                        </form>
                </div>
            </div>
    </body>
</html>
