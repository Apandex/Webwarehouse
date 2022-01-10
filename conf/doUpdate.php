<?php
include 'connection.php';

// menangkap data yang di kirim dari form
$id = $_POST['prod_ID'];
$nama = $_POST['prod_Name'];
$deskripsi = $_POST['prod_Desc'];
$jumlah = $_POST['prod_Qty'];
$harga = $_POST['prod_Cost'];

// update data ke database
mysqli_query($conn, "update inventory set prod_Name='$nama', prod_Desc='$deskripsi', prod_Qty='$jumlah', prod_Cost='$harga' where prod_ID='$id'");

header("location:../pages/stocks.php");
