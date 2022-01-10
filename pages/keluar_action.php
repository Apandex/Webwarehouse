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
                            <a href="../index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                        <h1 class="page-header">Edit Data</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit Stocks</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php
                                        include '../conf/connection.php';
                                        $id = $_GET['id'];
                                        $data = mysqli_query($conn, "select * from inventory where id='$id'");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <form role="form" method="post" action="../conf/doKeluar.php">
                                            <div class="form-group">
                                                    <label>ID</label>
                                                    <input class="form-control" value="<?php echo $d['id']; ?>" name="id" required disabled/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Code</label>
                                                    <input class="form-control" value="<?php echo $d['prod_Code']; ?>" name="prod_Code" required disabled/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input class="form-control" value="<?php echo $d['prod_Name']; ?>" name="prod_Name" required disabled/>
                                                </div>
                                                

                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label>Product Description</label>
                                                    <input class="form-control" rows="2" value="<?php echo $d['prod_Desc']; ?>" name="prod_Desc" required disabled></input>
                                                </div>
                                        <div class="form-group">
                                            <label>Product Quantity</label>
                                            <input type="number" min="0" oninput="this.value = Math.abs(this.value)" value="<?php echo $d['prod_Qty']; ?>" class="form-control" placeholder="Enter text" name="prod_Qty" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Product Value</label>
                                            <input type="number" min="0" oninput="this.value = Math.abs(this.value)" value="<?php echo $d['prod_Cost']; ?>" class="form-control" placeholder="Enter text" name="prod_Cost" style="margin-bottom: 40px;" required disabled />
                                        </div>
                                        <button type="submit" class="btn btn-success btn-lg btn-block"> Submit </button>

                                        </form>
                                    <?php
                                        }
                                    ?>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../js/startmin.js"></script>
</body>

</html>