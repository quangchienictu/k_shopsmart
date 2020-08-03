<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbName = "shopsmart";
$conn = mysqli_connect($host,$user,$password,$dbName);
mysqli_set_charset($conn,"utf8");

function getCurrentDate(){
	return date("d/m/Y");
}

function getStatus($status){
	switch ($status) {
		case -1:
		return "Đã huỷ";
		case 0:
		return "Đăng đặt";
		case 1:
		return "Đã xác nhận";
		case 2:
		return "Đã nhận hàng";
		default:
		return "Đã thanh toán";
	}
}

function getStatusAction($status){
	switch ($status) {
		case 0:
		return "Xác nhận";
		case 1:
		return "Giao hàng";
		case 2:
		return "Thanh toán";
	}
}

function formatPrice($priceFloat) {
	$symbol = 'đ';
	$symbol_thousand = '.';
	$decimal_place = 0;
	$price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
	return $price.$symbol;
}
?>