<?php 

require 'ceklogin.php';

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Laporan Penjualan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- <style>
        .container {
            width: 60%;
            margin-top: 9%;
            padding: 50px;
        }
     </style> -->

    </head>
            <body class="sb-nav-fixed">
                <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                    <!-- Navbar Brand-->
                    <a class="navbar-brand ps-3" href="index.php">Fito Store</a>
                    <!-- Sidebar Toggle-->
                    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                </nav>
                <div id="layoutSidenav">
                    <div id="layoutSidenav_nav">
                        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                            <div class="sb-sidenav-menu">
                                <div class="nav">
                                    <div class="sb-sidenav-menu-heading">Menu</div>
                                    <a class="nav-link" href="index.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                        Dashboard
                                    </a>
                                    <a class="nav-link" href="stok.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                        Data Produk
                                    </a>
                                    <a class="nav-link" href="pelanggan.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                                        Data Pelanggan
                                    </a>
                                    <a class="nav-link" href="transaksi.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                                        Transaksi Pembayaran
                                    </a>
                                    <a class="nav-link" href="laporan.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                        Laporan Penjualan
                                    </a>
                                    <a class="nav-link" href="logout.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user-lock"></i></div>
                                        Logout
                                    </a>
                                </div>
                            </div>
                            <div class="sb-sidenav-footer">
                                <div class="small"></div>
                                
                            </div>
                        </nav>
                    </div>

                        <div id="layoutSidenav_content">
                            <div class="content-wrapper">
                                <div class="content-header">
                                    <div class="container-fluid">
                                    <section id="main-content" style="margin-top: 100px;" class="ms-5 me-4">
                                        <section class="wrapper">
                                            <div class="row">
                                                <div class="col-lg-12 mb-3 main-chart">
                                                    <h3>Laporan Penjualan</h3>
                                                    
                                            <a href="cetak.php" target="_blank"><i class="btn btn-info">Cetak Laporan</i></a>
                                                </div>
                                        
                                        <!-- <div class="alert alert-success">
                                            <p>Edit Data Berhasil !</p>
                                        </div>
                                        
                                        <div class="alert alert-danger">
                                            <p>Hapus Data Berhasil !</p>
                                        </div>
                                        -->
                                        <div class="container">
                            
                                        <div class="card mb-4 mt-2">
                                        <div class="card-header bg-dark" style="color: white;">
                                            <i class="fas fa-shopping-cart me-1" style="color: white;"></i>
                                            Laporan Penjualan
                                        </div>
                                        <div class="card-body">
                                            <table id="datatablesSimple">
                                                <thead>
                                                    <tr>
                                                    <th>NO</th>
                                                        <th>ID Transaksi</th>
                                                        <th>Nama Produk</th>
                                                        <th>Jumlah</th>
                                                        <th>Total Bayar</th>
                                                        <th>Jumlah Uang</th>
                                                        <th>Pelanggan</th>
                                                        <th>Tanggal</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                      <?php
                      $sql     = "SELECT * FROM laporan";
                      $query   = mysqli_query($conn, $sql);

                      $no= 1;
                      //menampilkan data dari database
                      while ($row = mysqli_fetch_array($query)){
                      ?>
                      <tr>
                        <td align="center"><?php echo $no ?></td>
                        <td align="left"><?php echo $row[0] ?></td>
                        <td align="left"><?php echo $row[1] ?></td>
                        <td align="left"><?php echo $row[2] ?></td>
                        <td align="left"><?php echo $row[3] ?></td>
                        <td align="left"><?php echo $row[4] ?></td>
                        <td align="left"><?php echo $row[5] ?></td>
                        <td align="left"><?php echo $row[6] ?></td>
                                                        <td>
                                                        <a href="cetak_transaksi.php?id_transaksi=<?php echo $row['id_transaksi'] ?>" target="_blank"><i class="btn btn-success">CETAK</i></a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row[0] ?>">
                                                            Delete
                                                        </button>
                                                        </td>
                                                    </tr>
                                                        <!-- Modal delete -->
 <div class="modal fade" id="delete<?php echo $row[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus <?php echo $row[0] ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <form method="POST">
                                                <div class="modal-body">
                                                    Apakah anda yakin untuk menghapus Laporan Transaksi ini?
                                                   
                                                    <input type="hidden" name="idt" value="<?php echo $row[0] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="hapuslaporan">Yes</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                                </form>

                                                </div>
                                            </div>
                                            </div>
                                                    <?php
                      $no++;
                      }
                       ?>
                                                    </tbody>
                                            </table>                       
                                        </div>
                                    </div>
                                            
                                    </table>
                                    <br/>
                                    <br/>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>                    
            </section>
            </div>
            </section>
        </div>
     </div>


  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>