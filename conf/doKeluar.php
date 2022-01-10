<?php
include 'connection.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$jumlah = $_POST['prod_Qty'];


// update data ke database
mysqli_query($conn, "update inventory set  prod_Qty='$jumlah' where id='$id'");

mysqli_query($conn, "insert into history(data,date) values('Barang Keluar qty = $jumlah', curdate() )");


header("location:../pages/stocks.php");
