<?php
include 'header.php';
?>
<div class="overview-area pt-135">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="overview-content">
                    <h1><span>SHOP SMART</span></h1>
                    <h2>Your Collection</h2>
                    <div class="question-area">
                        <h4>Liên hệ? </h4>
                        <div class="question-contact">
                            <div class="question-icon">
                                <i class="icofont icofont-phone"></i>
                            </div>
                            <div class="question-content-number">
                                <h6>0123 456 789</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="overview-img">
                    <img class="tilter" src="img/hand_img-855e3.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-area pt-150 pb-110">
    <div class="container">
        <div class="section-title text-center mb-60">
            <h2>SẢN PHẨM ƯU CHUỘNG</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="grid-list-product-wrapper tab-content">
                    <div id="new-product" class="product-grid product-view tab-pane active">
                        <div class="row">
                            <?php
                            $sql = "SELECT *, (SELECT url FROM image where a.id = id_item  limit 1) as image FROM item a ORDER BY id_group limit 9 ";
                            include 'item.php';
                            ?>
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