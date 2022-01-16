<?php
// koneksi database
include 'connection.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysqli_query($conn, "delete from history where id='$id'");

// mengalihkan halaman kembali ke index.php
echo "<script>
alert('Rekam data telah berhasil dihapus!');
window.location.href='../pages/history.php';
</script>";
