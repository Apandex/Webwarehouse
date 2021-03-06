<?php

session_start();

if (!isset($_SESSION['email'])) {
  header("Location: ../index.php");
} ?>

<!DOCTYPE html>
<html lang="en">

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
            <h1 class="page-header">Warehouse</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">Warehouse Stocks</div>
              <!-- /.panel-heading -->
              <div class="panel-body">

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>History</th>
                      <th>Tanggal</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../conf/connection.php';

              
                    $halaman        = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                    $halaman_awal   = ($halaman > 1) ? ($halaman * 10) - 10 : 0;
                    $sebelum        = $halaman - 1;
                    $setelah        = $halaman + 1;
    
                    // mengambil data dari tabel pegawai untuk ditotal
                    $data = mysqli_query($conn, "select * from history");
    
                    // jumlah data pegawai ditotal
                    $jumlah_data    = mysqli_num_rows($data);
    
                    // ceil adalah fungsi pembulatan pada php
                    $total_halaman  = ceil($jumlah_data / 10);
    
                    // yang ini mengambil data pengawai untuk ditampilkan dengan fungsi limit
                    // satu halaman akan ditampilkan paling banyak 10 atau limit 10
                    $data_his   = mysqli_query($conn, "select * from history limit $halaman_awal, 10");
    
                    // nomor digunakan untuk penomoran pada kolom no
                    // karena index dimulai dari angka 0 maka perlu ditambah 1
                    $no          = $halaman_awal + 1;
    

                    while ($d = mysqli_fetch_array($data_his)) {
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['data']; ?></td>
                        <td><?php echo $d['date']; ?></td>

                        <td>
                          <button type="button" class="btn btn-danger btn-sm" onclick="location.href='../conf/doDeletehistory.php?id=<?php echo $d['id']; ?>'">Delete</button>
                        </td>
                      </tr>
                  </tbody>
                <?php
                    }
                ?>
                </table>
                <nav>
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$sebelum'"; } ?>>Previous</a>
                    </li>
                    <?php 
                        for($x = 1; $x <= $total_halaman; $x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"> <?php echo $x; ?></a></li>
                    <?php
                        }
                    ?> 
                    <li class="page-item">
                        <a  class="page-link" <?php  if($halaman < $total_halaman) { echo "href='?halaman=$setelah'"; } ?>>Next</a>
                    </li>
                </ul>
            </nav>

              </div>
              <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
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

  <!-- DataTables JavaScript -->
  <script src="../js/dataTables/jquery.dataTables.min.js"></script>
  <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="../js/startmin.js"></script>

  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>

</html>