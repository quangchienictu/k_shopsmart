<?php      
    require("connect.php") ;
    $sql="SELECT banan.*, min(oder.trangthai) as trangthai FROM banan LEFT JOIN oder on banan.id_banan = oder.id_banan   GROUP BY banan.id_banan ORDER BY banan.id_banan";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0){
                                
        while ($row = mysqli_fetch_assoc($result)){
            $id_banan=$row['id_banan'];
            $ten_banan = $row['ten_banan'];
            $ghichu= $row['ghichu'];    
?>
            <div class='col-lg-3 col-md-4'>
                <div class='table__item' >
                <a href='book_product.php?id_ban=<?php echo $id_banan; ?>' class='table__link' >

                        <img src='../image/icon_table.png' alt=''>
                        <div style="text-align:center; text-transform: uppercase;font-weight: 600;color: #ff7600;"><?php echo $ten_banan; ?></div>
                        <?php 
                            if($row['trangthai']==1||$row['trangthai']==2){
                                echo '<p style="color: white;position: absolute;top: 20px;right: 95px;padding: 5px 10px; background-image: linear-gradient(red, yellow);border-radius: 10px;">Có khách</p>';
                            }else{
                                    echo '<p style="color: white;position: absolute;top: 20px;right: 95px;padding: 5px 10px; background-image: linear-gradient(blue, green);border-radius: 10px;">Trống</p>';
                            }
                            ?>
                </a>
                </div>
            </div>
        <?php 
        }   
    }
    else{
        echo" 0 result";
        }
    
    
?>