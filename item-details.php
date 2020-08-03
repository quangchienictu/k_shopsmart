<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>

<?php
include "header.php";
$id = $_GET['id'];
$sql = "SELECT a.*, b.name as group_name FROM item a inner join `group` b on a.id_group = b.id where a.id = $id";
$query = $conn -> query($sql);
$row = $query -> fetch_array();
?>
<div class="product-details-area fluid-padding-3 ptb-130">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-details-img-content">
                    <div class="product-details-tab mr-40">
                        <div class="w3-content w3-display-container">
                            <?php
                            $sql = "SELECT * FROM image where id_item = $id";
                            $query = $conn -> query($sql);
                            while ($row1 = $query -> fetch_array()) {
                                $url = $row1['url'];
                                ?>
                                <div class="w3-display-container mySlides" style="width: 80%; margin-left: 10%">
                                    <img src="<?php echo $url?>" style="width:100%">
                                </div>
                                <?php
                            }
                            ?>
                            <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                            <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details-content">
                    <h2><?php echo $row['name']?></h2>
                    <!-- <div class="quick-view-rating">
                        <i class="fa fa-star reting-color"></i>
                        <i class="fa fa-star reting-color"></i>
                        <i class="fa fa-star reting-color"></i>
                        <i class="fa fa-star reting-color"></i>
                        <i class="fa fa-star reting-color"></i>
                        <span> ( 01 Customer Review )</span>
                    </div> -->
                    <div class="product-overview">
                        <h5 class="pd-sub-title">Hãng sản xuất</h5>
                        <p><?php echo $row['group_name']?></p>
                    </div>
                    <div class="product-price">
                        <span><?php echo formatPrice($row['price'])?></span>
                    </div>
                    <form method="post" action="?id=<?php echo $id?>">
                        <select name="size" style="margin-top: 20px">
                            <option value="Red">Red</option>
                            <option value="Black">Black</option>
                            <option value="Sliver">Sliver</option>
                            <option value="Gold">Gold</option>
                        </select>
                        <?php if($row['quantity']>0){ ?>
                        <div class="quickview-plus-minus">
                            <div class="cart-plus-minus" style="width: 200px">
                                <input style="width: 120px" type="number" value="1" min="1" name="count"  class="cart-plus-minus-box">
                            </div>
                            <div class="quickview-btn-cart">
                                <button type="submit" name="add-cart" class="" style="padding: 15px 10px;border-radius: 10px;background-color: yellow;"><span>Thêm vào giỏ hàng</span></button>
                            </div>
                        </div>
                        <?php }else{
                            echo '<div class="alert alert-danger mt-5">
                                  <strong>Thông báo !</strong> Sản phẩm tạm thời hết hàng !
                                </div>';
                        } ?>
                    
                    </form>
                    <div class="product-share">
                        <h5 class="pd-sub-title">Share</h5>
                        <ul>
                            <li>
                                <a href="#"><i style="line-height: 2" class="icofont icofont-social-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i style="line-height: 2" class="icofont icofont-social-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i style="line-height: 2" class="icofont icofont-social-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"> <i style="line-height: 2" class="icofont icofont-social-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-overview" style="padding: 100px" id="news-content">
            <h3 class="pd-sub-title" style="margin-top: 50px">Mô tả</h3>
            <p><?php echo $row['desc']?></p>
        </div>
    </div>
</div>

<div class="pb-130">
    <div class="row" style="justify-content: center;">
        <div class="overview-content">
            <h1><span>SẢN PHẨM KHÁC</span></h1>
            <br/>
        </div>
        <div class="col-lg-12">
            <div class="row" style="justify-content: center;">
                <?php
                $sql = "SELECT *, (SELECT url FROM image where a.id = id_item limit 1) as image FROM item a ORDER BY RAND() limit 5";
                $query = $conn -> query($sql);
                while ($row = $query -> fetch_array()) {
                    ?>
                    <div class="col-lg-2 col-md-2">
                        <a href="item-details.php?id=<?php echo $row['id']?>">
                            <div class="blog-hm-wrapper mb-40">
                                <div class="blog-img">
                                    <img height="250" src="<?php echo $row['image']?>" alt="image">
                                </div>
                                <div>
                                    <center>
                                        <h3><?php echo $row['name']?></h3>
                                        <p><?php echo $row['price']?></p>
                                    </center>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
<style type="text/css">
    #news-content{
        text-align: justify; 
        text-justify: inter-word;
    }
    #news-content img {
        width: 100% !important;
    }
</style>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      x[slideIndex-1].style.display = "block";  
    }
</script>