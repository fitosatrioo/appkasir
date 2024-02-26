<?php 

require 'ceklogin.php';
$h1 = mysqli_query($conn, "select *from pelanggan");
$h2 = mysqli_num_rows($h1);


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Pelanggan</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
     

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="pelanggan.php">Fito Store</a>
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
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Data Pelanggan</h1>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Pelanggan: <?php echo $h2; ?></div>
                                </div>
                            </div>
                        </div>

                          <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  Tambah Pelanggan
                            </button>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pelanggan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Gambar</th>
                                            <th>No Telepon</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                    <?php 
                                        $ambil =mysqli_query($conn,"SELECT * FROM pelanggan");

                                        $i = 1;
                                        while($p = mysqli_fetch_array($ambil)){
                                        $nama_pelanggan = $p['nama_pelanggan'];
                                        $gp = $p["gambar_pelanggan"];
                                        $telepon = $p['telepon'];
                                        $alamat = $p['alamat'];
                                        $id_pelanggan = $p['id_pelanggan'];
                                    

                                       
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $nama_pelanggan;?></td>
                                            <td>
                                               <img src="img/<?php echo $gp; ?>"> 
                                           </td>
                                            <td><?php echo $telepon; ?></td>
                                            <td><?php echo $alamat; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id_pelanggan; ?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id_pelanggan; ?>">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                         <!-- Modal edit -->
                                         <div class="modal fade" id="edit<?php echo $id_pelanggan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah <?php echo $nama_pelanggan;?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <form method="POST">
                                                <div class="modal-body">
                                                     <input type="text" class="form-control mb-3" name="nama_pelanggan" placeholder="Nama Pelanggan" value="<?php echo $nama_pelanggan;?>">
                                                     Gambar
                                                     <input type="file" class="form-control mb-3" name="gambar_pelanggan" placeholder="Gambar" value="<?php echo $gp;?>">
                                                    <input type="text" class="form-control mb-3" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $alamat;?>">
                                                    <input type="text" class="form-control mb-3" name="telepon" placeholder="Masukkan No Telepon" value="<?php echo $telepon;?>">
                                                    <input type="hidden" name="idpl" value="<?php echo $id_pelanggan;?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="editpelanggan">Submit</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                                </form>

                                                </div>
                                            </div>
                                            </div>

                                              <!-- Modal delete -->
                                              <div class="modal fade" id="delete<?php echo $id_pelanggan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus <?php echo $nama_pelanggan;?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <form method="POST">
                                                <div class="modal-body">
                                                    Apakah anda yakin untuk menghapus pelanggan ini?
                                                   
                                                    <input type="hidden" name="idpl" value="<?php echo $id_pelanggan;?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="hapuspelanggan">Yes</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                                </form>

                                                </div>
                                            </div>
                                            </div>

                                         <?php 

                                             }
                                                    
                                        ?>
                                

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST">
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" name="nama_pelanggan" placeholder="Nama Pelanggan">
                    Gambar
                    <input type="file" class="form-control mb-3" name="gambar_pelanggan" placeholder="Gambar">
                    <input type="num" class="form-control mb-3" name="telepon" placeholder="No Telepon">
                    <input type="text" class="form-control mb-3" name="alamat" placeholder="Alamat">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="tambahpelanggan">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
                </form>

    </div>
  </div>
</div>
</html>