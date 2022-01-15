<?php

session_start();

if (!isset($_SESSION['email'])) {
  header("Location: ../index.php");
} ?>
<?php
function Logout()
{
  session_start();
  session_destroy();
  header("Location: ../index.php");
}
if (isset($_GET['logout'])) {
  Logout();
}
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    body {

        background-size: 1370px;
    }
</style>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>NAHINI Warehouse</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="../css/startmin.css" rel="stylesheet" />

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">NAHINI Warehouse</a>
            </div>

            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="dashboard.php?logout=true"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">

                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="dashboard.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Homepage</a>
                        </li>
                        <li>
                            <a href="stocks.php"><i class="fa fa-cube fa-fw"></i> Stocks</a>
                        </li>
                        <li>
                            <a href="goods.php"><i class="fa fa-edit fa-fw"></i> Barang Masuk</a>
                        </li>
                        <li>
                            <a href="barangkeluar.php"><i class="fa fa-edit fa-fw"></i> Barang Keluar</a>
                        </li>
                        <li>
                            <a href="history.php"><i class="fa fa-edit fa-fw"></i> History</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12">
                        <h1 class="page-header">Selamat Datang</h1>
                        <p style="margin-top:20px; font-size:30px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">NahIni Warehouse Web</p>
                        <p style="margin-left: 20px; margin-top:5px; font-size:15px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">adalah sebuah web yang akan membantu kalian dalam melakukan pengelolaan dalam <br>warehouse ini.
Panduan penggunaan Web : <br>
- Stock adalah  fitur yang digunakan untuk melihat stock inventory barang dan dapat update
<br> + delete juga.<br>
- Barang Masuk adalah menu untuk melakukan pendataan terkait barang yang masuk.<br>
- Barang Keluar adalah menu untuk melakukan pendataan terkait barang yang keluar.<br>
- History adalah menu dimana segala catatan transaksi bisa dilihat.</p>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>



            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/startmin.js"></script>

</body>

</html>

