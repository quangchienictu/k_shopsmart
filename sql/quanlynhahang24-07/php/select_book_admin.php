<?php      
                require("connect.php") ;
               // $sql = "SELECT banan.*,oder.trangthai FROM banan LEFT JOIN oder on banan.id_banan = oder.id_banan   GROUP BY banan.id_banan ORDER BY banan.id_banan  "; //AND oder.trangthai=1 OR oder.trangthai=null
                $sql="SELECT banan.*, min(oder.trangthai) as trangthai FROM banan LEFT JOIN oder on banan.id_banan = oder.id_banan   GROUP BY banan.id_banan ORDER BY banan.id_banan";
                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) > 0){
                                            
                    while ($row = mysqli_fetch_assoc($result)){
                        $id_banan=$row['id_banan'];
                        $ten_banan = $row['ten_banan'];
                        $ghichu= $row['ghichu'];    
            ?>
                        <div class='col-xl-4 col-lg-4 col-md-4 col-sm-6' <?php  if($row['trangthai']==1||$row['trangthai']==2){echo "onclick='thanhtoan($row[id_banan])'";} ?> >
                            <div class='table__item' >
           
                                    <img src='../image/icon_table.png' alt=''>
                                    <div style="text-align:center; color: #ff7600;"><?php echo $ten_banan; ?></div>
                                    <?php 
                                        if($row['trangthai']==1||$row['trangthai']==2){
                                            echo '<p style="color: white;position: absolute;top: 20px;right: 70px;padding: 5px 10px; background-image: linear-gradient(red, yellow);border-radius: 10px;">Có khách</p>';
                                        }else{
                                             echo '<p style="color: white;position: absolute;top: 20px;right: 70px;padding: 5px 10px; background-image: linear-gradient(blue, green);border-radius: 10px;">Trống</p>';
                                        }
                                     ?>
                         
                            </div>
                        </div>
                    <?php 
                    }   
                }
                else{
                    echo" 0 result";
                    }
              
            ?>

  <div id="id1" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <p>Some text..</p>
        <p>Some text..</p>
      </div>
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
</div>
        
    <script type="text/javascript">

        function thanhtoan(id){
           window.location="thanhtoan.php?id_banan="+id;

        }
    </script>