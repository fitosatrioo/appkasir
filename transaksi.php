<?php

require 'ceklogin.php';


$produk = mysqli_query($conn, "SELECT * from produk");
$pelanggan = mysqli_query($conn, "SELECT * from pelanggan");

$sumharga = 0;
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $key => $value){
        $sumharga =(int)$value['harga'] * (int)$value['jumlah'];
    }
}

$cart = $_SESSION['cart'];

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Transaksi</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />

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
                                        <div class="sb-nav-link-icon"><i class="fas fa-poll"></i></div>
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
                                    <section id="main-content" style="margin-top: 30px; margin-bottom: 50px;" class="ms-5">
                                        <section class="wrapper">
                                            <div class="row">
                                                <div class="col-lg-12 mb-3 main-chart">
                                                    <h3>Transaksi Pembayaran</h3>
                                                </div>



                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                <!-- <form method="post" action="function.php" > -->
                                                <form method="post" action="keranjang.php">
                                                    <div class="input-group">
                                                    Pilih Produk :
                                                        <select class="form-control" name="id_produk" id="id_select2_example" style="width:500px;">
                                                            <option hidden readonly>Pilih Produk</option>
                                                            <?php while ($row = mysqli_fetch_array($produk)) { ?>
        <option data-img_src="img/<?=$row['gambar']?>" value="<?=$row['id_produk']?>" required><?=$row['nama_produk']?> (Rp. <?=$row['harga']?>)</option>
        
                                                        <?php } ?>
                                                        </select>

                                                    <div class="input-group">
                                                        <input type="number" name="jumlah" class="form-control mt-4" placeholder="jumlah" required>
                                                    </div>
                                                </div>


                                                    <span class="input.btn-group">
                                                            <button type="submit" class="btn btn-primary mt-4" name="tambahkeranjang">Hitung</button>
                                                            </span>


                                                </formz`>
                                                <div class="col-md-4 mt-3">
                                                    <div>
                                                    <b class="mr-2">Total</b> <span id="nota"></span>
                                                    </div>
                                                    <span id="total" style="font-size: 50px; line-height: 1" class="text-danger"><?=number_format($sumharga)?></span>
                                                    <button type="submit" class="btn btn-danger ms-1 mt-4" style="width: 80px;"> <a style="color: white;" href="keranjang-reset.php">Reset</a></button>
                                                
                                                </div>

                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="card mb-4 mt-2">
                                        <div class="card-header bg-info">
                                            <i class="fas fa-shopping-cart me-1"></i>
                                            Kasir
                                        </div>
                                        <div class="card-body">
                                            <table id="datatablesSimple">
                                                <thead>
                                                    <tr>
                                                    <th>NO</th>
                                                        <th>ID</th>
                                                        <th>Produk</th>
                                                        <th>Jumlah</th>
                                                        <th>Total Bayar</th>
                                                        <th>Tanggal</th>
                                                        <th>Pembayaran</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                        $ambil =mysqli_query($conn,"SELECT * FROM transaksi");
                      $no= 1;
                      //menampilkan data dari database
                      while($p = mysqli_fetch_array($ambil)){
                        $id = $p['id_transaksi'];
                        $nama = $p['nama_produk'];
                        $jumlah = $p['jumlah'];
                        $total = $p['total_bayar'];
                        $tgl = $p['tanggal'];
                      ?>
                      <tr>
                        <td align="center"><?php echo $no ?></td>
                        <td align="left"><?php echo $id; ?></td>
                        <td align="left"><?php echo $nama; ?></td>
                        <td align="left"><?php echo $jumlah; ?></td>
                        <td align="left"><?php echo $total; ?></td>
                        <td align="left"><?php echo $tgl; ?></td>
                        <td align="left">
                        <button type="button" class="btn btn-warning mb-4" data-bs-toggle="modal" data-bs-target="#tambah<?php echo $id; ?>">
                                  Bayar
                            </button>                    
                            <td align="center">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id; ?>">
                                                    Hapus
                                                </button>

                        </td>
                      </tr>
                      <!-- Modal -->
            <div class="modal fade" id="tambah<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pembayaran <?php echo $id; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST">
                <div class="modal-body">
                    Nama Produk
                    <input type="text" class="form-control mb-3" name="nama" value="<?php echo $nama; ?>" readonly/>
                    Jumlah Produk
                    <input type="num" class="form-control mb-3" name="jumlah" value="<?php echo $jumlah; ?>" readonly/>
                    Total Bayar
                    <input type="text" class="form-control mb-3" name="total" value="<?php echo $total; ?>" readonly/>
                    Jumlah Uang
                    <input type="text" class="form-control mb-3" name="uang">
                    ID & Nama Pelanggan
                    <select class="form-control" name="pelanggan">
                        <option hidden readonly>Pilih Pelanggan</option>
                            <?php 
                            $sql     = "SELECT * FROM pelanggan";
                            $query   = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)){
                            ?> { ?>
                        <option value="(ID:<?php echo $row[0] ?>) <?php echo $row[1] ?>">(ID:<?php echo $row[0] ?>) <?php echo $row[1] ?></option>
                            <?php } ?>
                    </select>
               </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="tambahtransaksi">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
                </form>

    </div>
  </div>
</div> 
 <!-- Modal delete -->
 <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus <?php echo $id;?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <form method="POST">
                                                <div class="modal-body">
                                                    Apakah anda yakin untuk menghapus Keranjang ini?
                                                   
                                                    <input type="hidden" name="idt" value="<?php echo $id;?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="hapustransaksi">Yes</button>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script type="text/javascript">
    function custom_template(obj){
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if(data && data['img_src']){
                img_src = data['img_src'];
                template = $("<div><img src=\"" + img_src + "\" style=\"width:50px;height:50px;font-weight:700;font-size:12pt;text-align:center;\"> &nbsp;" + text + "</div>");
                return template;
            }
        }
    var options = {
        'templateSelection': custom_template,
        'templateResult': custom_template,
    }
    $('#id_select2_example').select2(options);
    $('.select2-container--default .select2-selection--single').css({'height': '60px', 'width': '384px'});

</script>
      

    </body>
         

</html>