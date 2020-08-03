<?php
include 'header.php';
?>
<div class="shop-wrapper fluid-padding-2 pt-120 pb-150">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-sidebar-area pr-60">
                    <!-- <div class="sidebar-widget pb-55">
                        <h3 class="sidebar-widget">Search Products</h3>
                        <div class="sidebar-search">
                            <form action="#">
                                <input type="text" placeholder="Search Products...">
                                <button><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div> -->
                    <div class="sidebar-widget pb-50">
                        <h3 class="sidebar-widget">Hãng sản xuất</h3>
                        <div class="widget-categories">
                            <ul>
                                <?php
                                $sql = "SELECT * FROM `group`";
                                $query = $conn -> query($sql);
                                while ($row = $query -> fetch_array()) {
                                    $name = $row['name'];
                                    $id = $row['id'];
                                    echo "<li><a href='?id=$id'>$name</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-55">
                        <form method="post">
                            <h3 class="sidebar-widget">Theo giá</h3>
                            <div class="price_filter mr-60">
                                <div id="slider-range"></div>
                                <div class="price_slider_amount">
                                    <div class="label-input">
                                        <label>Giá : </label>
                                        <input style="width: auto;" type="text" id="amount" name="price"/>
                                    </div>
                                    <br/>
                                    <button type="submit">Filter</button> 
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget">Ưu chuộng</h3>
                        <div class="best-seller">
                            <?php
                            $sql = "SELECT *, (SELECT url FROM image where a.id = id_item limit 1) as image FROM item a limit 3";
                            $query = $conn -> query($sql);
                            while ($row = $query -> fetch_array()) {
                                ?>
                                <a href="item-details.php?id=<?php echo $row['id']?>">
                                    <div class="single-best-seller">
                                        <div class="best-seller-img">
                                            <img width="100" height="100" src="<?php echo $row['image']?>" alt="">
                                        </div>
                                        <div class="best-seller-text">
                                            <h3><?php echo $row['name']?></h3>
                                            <span><?php echo $row['producer']?></span>
                                            <br/>
                                            <span><?php echo formatPrice($row['price'])?></span>
                                        </div>
                                    </div>
                                </a>
                                <hr/>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="grid-list-product-wrapper tab-content">
                    <div id="new-product" class="product-grid product-view tab-pane active">
                        <div class="row">
                            <?php
                            $min = 0;
                            $max = 999999999;
                            if (isset($_POST['price'])) {
                                $price = $_POST['price'];
                                $price = explode(" - ", $price);
                                $min = $price[0];
                                $max = $price[1];
                                // $("#slider-range").slider('values',0,$min); // sets first handle (index 0) to 50
                                // $("#slider-range").slider('values',1,$max); // sets first handle (index 0) to 50

                            }
                            $sql = "SELECT *, (SELECT url FROM image where a.id = id_item  limit 1) as image FROM item a where price >= $min and price <= $max";
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $sql = $sql." and id_group = $id";
                            }
                            $query = $conn -> query($sql);
                            include 'item.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include 'footer.php';
?>