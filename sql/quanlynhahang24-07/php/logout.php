<?php 
include("session_user.php");
session_destroy();
header("Location:login.php");
 ?>