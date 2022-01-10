<?php
include 'connection.php';

// menangkap data yang di kirim dari form
$code = $_POST['prod_Code'];
$nama = $_POST['prod_Name'];
$deskripsi = $_POST['prod_Desc'];
$jumlah = $_POST['prod_Qty'];
$harga = $_POST['prod_Cost'];

// menginput data ke database
mysqli_query($conn, "insert into inventory (prod_Code, prod_Name, prod_Desc, prod_Qty,prod_Cost) values('$code','$nama','$deskripsi','$jumlah','$harga')");

header("location:../pages/goods.php");
