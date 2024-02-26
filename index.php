<?php 

require 'ceklogin.php';
$h1 = mysqli_query($conn, "select *from produk");
$h2 = mysqli_num_rows($h1);

$h3 = mysqli_query($conn, "select *from pelanggan");
$h4 = mysqli_num_rows($h3);

$h5 = mysqli_query($conn, "select *from laporan");
$h6 = mysqli_num_rows($h5);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
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

             <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <div class="content-header mt-2">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col">
                      <h1 class="m-0 text-dark mb-3 mt-2">Dashboard</h1>
                    </div>
                  </div>
                  </div>    
                </div>


            <!-- /.content-header -->
          <div class="row text-white ms-5">
              <div class="card bg-info ml-5" style="width: 20rem;">
                <div class="card-body">
                  <div class="card-body-icon">
                  <i class="fas fa-shopping-cart mr-3"></i>
                  </div>
                <h5 class="card-title">Data Produk</h5>
                <div class="display-4 ml-2"><?php echo $h2; ?></div>
                <a href="stok.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
              </div>
            </div>

            <div class="card bg-warning ml-5 ms-4" style="width: 20rem;">
                <div class="card-body">
                  <div class="card-body-icon">
                  <i class="fas fa-money-bill mr-3"></i>
                  </div>
                <h5 class="card-title">Riwayat Transaksi</h5>
                <div class="display-4 ml-2"><?php echo $h6; ?></div>
                <a href="transaksi.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
        </div>

        <div class="card bg-danger ml-5 ms-4" style="width: 20rem;">
                <div class="card-body">
                  <div class="card-body-icon">
                  <i class="fas fa-user mr-2"></i>
                  </div>
                <h5 class="card-title">Data Pelanggan</h5>
                <div class="display-4 ml-2"><?php echo $h4; ?></div>
                <a href="pelanggan.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
            </div>
          </div>
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

          <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

          <form method="POST">
            <div class="modal-body">
            pilih pelanggan
            <select name="id_pelanggan" class="form-control">
                                              
            <?php 
            
            $getpelanggan = mysqli_query($conn, "select * from pelanggan");
            while($pl = mysqli_fetch_array($getpelanggan)){
                $id_pelanggan = $pl['id_pelanggan'];
                $alamat = $pl['alamat'];
                $nama_pelanggan = $pl['nama_pelanggan'];

            
            ?>
            
              
              <option value="<?php echo $id_pelanggan; ?>"> <?php echo $nama_pelanggan;?> - <?php echo $alamat; ?></option>

            <?php 
            
            }
            ?>

            </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="tambahpesanan">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </form>

    </div>
  </div>
</div>
</html>
