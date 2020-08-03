<?php
    require("connect.php");

    // select id data
    $id =$_GET["id"];
    $sql = "DELETE FROM user WHERE id_user=$id";
    $result = mysqli_query($conn,$sql);
    header("location:manage_admin.php");
   
    mysqli_close($conn);
?>