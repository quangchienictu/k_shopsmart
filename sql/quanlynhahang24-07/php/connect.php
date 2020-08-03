<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlynhahang";

// Create connection
 $conn = new mysqli($servername, $username, $password,$dbname);
	mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "kết nối thành công";
date_default_timezone_set('Asia/Ho_Chi_Minh');


?>