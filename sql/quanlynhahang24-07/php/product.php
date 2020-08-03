<?php 
/*    require("session_user.php");*/
if(isset($_SESSION['login_user'])){
  $sql2="SELECT * FROM user where sdt_user = ".$_SESSION['login_user'];
  $result2 = $conn->query($sql2);
  $data = $result2->fetch_assoc();
  if($data['quyen_user']==1){
    
  }else{
     header('Location:admin.php');
 }
}else{
 header("location: login.php");
}

    $sql1="SELECT * FROM danhmuc";
    $result1 = mysqli_query($conn,$sql1);

?>
        <!-- PRODUCT ITEM -->
        <?php 
            if(mysqli_num_rows($result1)){ 
            $i=1; 
                while($row1 = mysqli_fetch_array($result1) ){  
                    

                    $sql2="SELECT * FROM sp where loai_sp = ".$row1['id_danhmuc'];
                    $result2 = mysqli_query($conn,$sql2); 
                          
                    echo "<div class='row' id='".$i."'><h3 class='col-lg-12' style='color: #bd0046;'>".$row1['ten_danhmuc']."</h3><br></div>";
                    echo"<div class='row'>";
                     while( $row2 =$result2 -> fetch_object()){ 
                        $image=$row2 -> img_sp;
                        $image_src='../image/'.$image;
                        $ten_sp=$row2->ten_sp;
                        $gia_sp=$row2->gia_sp;
                        $khuyenmai_sp=$row2->khuyenmai_sp;

                        $id_sp = $row2->id_sp;
                        $temp = "href='book_product.php?id=".$id_sp."'";

                        $uri = $_SERVER['REQUEST_URI'];
                        $uri2=substr( $uri,  0, strpos($uri,"&"));
                        $url=$uri2==false?$uri:$uri2;



                        $giakhuyenmai_sp=$gia_sp-(($gia_sp * $khuyenmai_sp)/100);
                        ?>                         
                                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-4">
                                <a href="<?php echo $url.'&id='.$id_sp; ?>">
                                
                                    <div class="home__product-item" onclick="return add_mon_an(this);">
                                        <div class="home__product-item-img" id="link" style="background-image: url('<?php echo $image_src; ?>');"></div>
                                        <h4 class="home__product-item-name" id="name"><?php echo $ten_sp; ?></h4>
                                        <div class="home__product-item-price">
                                            <span class="home__product-item-price-old" id="old"><?php echo $gia_sp; ?>đ</span>
                                            <span class="home__product-item-price-curent" id="curent" ><?php echo $giakhuyenmai_sp; ?>đ</span>
                                        </div>
                                        <div class="home__product-item-price-sale"> 
                                            <span class="home__product-item-price-sale-percent" id="sale" ><?php echo $khuyenmai_sp; ?>%</span>
                                            <span class="home__product-item-price-sale-label" style="font-size:14px;top:-8px;">GIẢM</span>
                                        </div>
                                    </div>
                                </a>
                                </div>

                <?php                
                        
                   
                }
                echo"</div>";
                $i++;
                }

            }
        ?>
        