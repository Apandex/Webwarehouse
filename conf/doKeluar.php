<?php
include 'connection.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['prod_Name'];
$qty = $_POST['prod_Qty'];
$outqty = $_POST['Out_Qty'];
$jumlah =  $qty - $outqty;


// update data ke database
mysqli_query($conn, "update inventory set  prod_Qty='$jumlah' where id='$id'");

mysqli_query($conn, "insert into history(data,date) values('Barang Keluar nama = $nama, qty = $outqty', curdate() )");

echo "<script>
alert('Data telah berhasil direkam!');
window.location.href='../pages/stocks.php';
</script>";
