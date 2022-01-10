<?php
include 'connection.php';

// menangkap data yang di kirim dari form
$id = $_POST['prod_ID'];
$nama = $_POST['prod_Name'];
$deskripsi = $_POST['prod_Desc'];
$jumlah = $_POST['prod_Qty'];
$harga = $_POST['prod_Cost'];

// menginput data ke database
mysqli_query($conn, "insert into inventory values('$id','$nama','$deskripsi','$jumlah','$harga')");

header("location:../pages/goods.php");
