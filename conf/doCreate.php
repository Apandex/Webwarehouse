<?php
include 'connection.php';

// menangkap data yang di kirim dari form
$code = $_POST['prod_Code'];
$nama = $_POST['prod_Name'];
$deskripsi = $_POST['prod_Desc'];
$jumlah = $_POST['prod_Qty'];
$harga = $_POST['prod_Cost'];

// menginput data ke database
$sql = "SELECT * FROM inventory WHERE prod_Code=?"; // SQL with parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $code);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
if (!$result->num_rows > 0) {
    $sqlinput = "insert into inventory (prod_Code, prod_Name, prod_Desc, prod_Qty,prod_Cost) values(?,?,?,?,?)";
    // SQL with parameters
    $stmtinput = $conn->prepare($sqlinput);
    $stmtinput->bind_param("sssii", $code, $nama, $deskripsi, $jumlah, $harga);
    $data = "Data Baru nama = $nama, deskripsi = $deskripsi, qty = $jumlah, harga = $harga";
    $date = date("Y-m-d");

    if ($stmtinput->execute()) {

        $sql1 = "insert into history (data, date) values(?,?)";
        $stmthistory = $conn->prepare(($sql1));
        echo $data;
        echo $date;
        $stmthistory->bind_param("ss", $data, $date);
        if ($stmthistory->execute()) {
            $code = "";
            $nama = "";
            $deskripsi = "";
            $jumlah = "";
            $harga = "";
            echo "<script>
        alert('data berhasil direkam');
        window.location.href='../pages/stocks.php';
        </script>";
        } else {
            echo $stmthistory->error;
        };
    } else {
        echo $stmtinput->error;
    }
} else {
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
