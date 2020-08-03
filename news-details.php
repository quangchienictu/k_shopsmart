<?php
include 'header.php';
$id = $_GET['id'];
$sql = "SELECT * FROM news where id = $id";
$query = $conn -> query($sql);
$row = $query -> fetch_array();
?>
<div class="blog-area pt-120 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="product-sidebar-area pr-30">
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget">CÁC BÀI VIẾT KHÁC</h3>
                        <div class="best-seller">
                            <?php
                            $sql = "SELECT * FROM news ORDER BY RAND() LIMIT 10";
                            $query = $conn -> query($sql);
                            while ($row1 = $query -> fetch_array()) {
                                ?>
                                <div class="single-best-seller">
                                    <div class="best-seller-img">
                                        <a href="news-details.php?id=<?php echo $row1['id']?>"><img width="100" height="100" src="<?php echo $row1['image']?>" alt=""></a>
                                    </div>
                                    <div class="best-seller-text">
                                        <h5><?php echo $row1['title']?></h5>
                                        <span><?php echo $row1['pub_date']?></span>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog-details-wrapper res-mrg-top">
                    <div class="blog-img mb-30">
                        <img src="<?php echo $row['image']?>" alt="image">
                        <div class="blog-date">
                            <h4 style="padding-bottom: 5px"><?php echo $row['pub_date']?></h4>
                        </div>
                    </div>
                    <h2><?php echo $row['title']?></h2>
                    <p>
                        <?php echo $row['desc']?>
                    </p>
                    <div id="news-content">
                        <?php echo $row['content']?>
                    </div>
                </div>
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