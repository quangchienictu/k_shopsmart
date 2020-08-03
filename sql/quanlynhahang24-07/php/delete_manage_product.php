<?php
    require("connect.php");

    // select id data
    $id =$_GET["id"];
    $sql = "DELETE FROM sp WHERE id_sp=$id";
    $result = mysqli_query($conn,$sql);
    header("location:manage_product.php");
   
    mysqli_close($conn);
?>                              