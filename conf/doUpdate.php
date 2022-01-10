<?php
include 'connection.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$code = $_POST['prod_Code'];
$nama = $_POST['prod_Name'];
$deskripsi = $_POST['prod_Desc'];
$jumlah = $_POST['prod_Qty'];
$harga = $_POST['prod_Cost'];

// update data ke database
mysqli_query($conn, "update inventory set prod_Code='$code' ,prod_Name='$nama', prod_Desc='$deskripsi', prod_Qty='$jumlah', prod_Cost='$harga' where id='$id'");

mysqli_query($conn, "insert into history(data,date) values('Data Update  nama = $nama, deskripsi = $deskripsi, qty = $jumlah, harga = $harga', curdate() )");


header("location:../pages/stocks.php");
