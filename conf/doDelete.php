<?php
// koneksi database
include 'connection.php';

// menangkap data id yang di kirim dari url
$id = $_GET['prod_ID'];


// menghapus data dari database
mysqli_query($conn, "delete from inventory where prod_ID='$id'");

// mengalihkan halaman kembali ke index.php
header("location:../pages/stocks.php");
