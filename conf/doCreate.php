<?php
include 'connection.php';

// menangkap data yang di kirim dari form
$code = $_POST['prod_Code'];
$nama = $_POST['prod_Name'];
$deskripsi = $_POST['prod_Desc'];
$jumlah = $_POST['prod_Qty'];
$harga = $_POST['prod_Cost'];

// menginput data ke database
$sql = "SELECT * FROM inventory WHERE prod_Code='$code'";
$result = mysqli_query($conn, $sql);
if (!$result->num_rows > 0) {
    mysqli_query($conn, "insert into inventory (prod_Code, prod_Name, prod_Desc, prod_Qty,prod_Cost) values('$code','$nama','$deskripsi','$jumlah','$harga')");

    mysqli_query($conn, "insert into history(data,date) values('Data Baru nama = $nama, deskripsi = $deskripsi, qty = $jumlah, harga = $harga', curdate() )");
    $code = "";
    $nama = "";
    $deskripsi = "";
    $jumlah = "";
    $harga = "";
    echo "<script>
    alert('data berhasil direkam');
    window.location.href='../pages/stock.php';
    </script>";} 
    else {
    echo "<script>
alert('Product sudah terdaftar');
window.location.href='../pages/goods.php';
</script>";
    $code = "";
    $nama = "";
    $deskripsi = "";
    $jumlah = "";
    $harga = "";
}
