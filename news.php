<?php
include 'header.php';
?>
<div class="blog-area pt-120 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM news order by id desc";
                    $query = $conn -> query($sql);
                    while ($row = $query -> fetch_array()) {
                        ?>
                        <div class="col-lg-4 col-md-4">
                            <a href="news-details.php?id=<?php echo $row['id']?>">
                                <div class="blog-hm-wrapper mb-40">
                                    <div class="blog-img">
                                        <img height="250" src="<?php echo $row['image']?>" alt="image">
                                        <div class="blog-date">
                                            <h4 style="padding-bottom: 5px;"><?php echo $row['pub_date']?></h4>
                                        </div>
                                    </div>
                                    <div class="blog-hm-content">
                                        <h3 style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; "><?php echo $row['title']?></h3>
                                        <p><?php echo $row['desc']?></p>
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
</div>
<?php
include 'footer.php';
?>