<?php

require 'ceklogin.php';


$produk = mysqli_query($conn, "SELECT * from produk");
$pelanggan = mysqli_query($conn, "SELECT * from pelanggan");

$sumharga = 0;
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $key => $value){
        $sumharga += $value['harga']*$value['jumlah'];
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
                                                        <select class="form-control" name="id_produk">
                                                            <option value="">Pilih Produk</option>
                                                            <?php while ($row = mysqli_fetch_array($produk)) { ?>
                                                            <option value="<?=$row['id_produk']?>"><?=$row['nama_produk']?></option>
                                                        <?php } ?>
                                                        </select>

                                                    <div class="input-group">
                                                        <input type="number" name="jumlah" class="form-control mt-4" placeholder="jumlah">
                                                    </div>
                                                </div>


                                                    <span class="input.btn-group">
                                                            <button type="submit" class="btn btn-primary mt-4">Tambah</button>
                                                            <button type="button" name="bayar" class="btn btn-warning ms-2 mt-4" style="width: 80px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Bayar</button>
                                                           
                                                    </span>


                                                </form>
                                                <div class="col-md-4 mt-3">
                                                    <div>
                                                    <b class="mr-2">Nota</b> <span id="nota"></span>
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
                                                      
                                                        <th>Produk</th>
                                                        <th>Harga</th>
                                                        <th>Jumlah</th>
                                                        <th>Sub Total</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                       <?php foreach($cart as $key => $value) : ?>         

                                                    <tr>
                                        
                                                        <td><?php echo $value['nama'] ?></td>
                                                        <td><?php echo $value['harga'] ?></td>
                                                        <td><?php echo $value['jumlah'] ?></td>
                                                        <td><?php echo number_format($value['harga']*$value['jumlah'])  ?></td>
                                                        <td><a href="keranjang-hapus.php?id=<?=$value['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                                    </tr>

                                                        <?php endforeach; ?>

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
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaksi Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST">
                <div class="modal-body">
                    <label class="" for="">tanggal</label>
                    <input type="date" name="tanggal" class="form-control">

                    <label class="mt-3" for="" style="font: bold;">Pelanggan</label>
                    <select class="form-control" name="id_pelanggan" id="id_pelanggan">
                         <option value="">Pilih Pelanggan</option>
                            <?php while ($fetch = mysqli_fetch_array($pelanggan)) { ?>
                        <option value="<?=$fetch['id_pelanggan']?>" ><?=$fetch{'nama_pelanggan'}?></option>
                    <?php } ?> 
                    </select>

                    <label class="mt-3" for="">Jumlah Uang</label>
                    <input type="number" name="jumlah_uang" class="form-control" placeholder="jumlah Uang">

                    <label class="mt-3" for="">Total Bayar:</label><br>
                    <label class="mt-2" for="">Kembalian:</label>

                
                    
                   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="tambahtransaksi">Bayar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
                </form>
                            
</html>
<?php 

session_start();

// koneksi
$conn = mysqli_connect('localhost','root','','fitokasir');

// login
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
    $hitung = mysqli_num_rows($query);

    if($hitung>0){

    $_SESSION['login'] = 'True';
    header('location:index.php');

    } else {
        echo '
        <script>alert("username atau password salah");
        window.location.href = "login.php"
        </script>
        ';

    }

}


// tambah produk
if(isset($_POST['tambahbarang'])){
    $nama_produk = $_POST['nama_produk'];
    $gambar = $_POST['gambar'];
    $harga = $_POST['harga'];
    $stok= $_POST['stok'];
   

    $insert = mysqli_query($conn,"insert into produk(nama_produk,gambar,harga,stok) values('$nama_produk','$gambar','$harga','$stok')");

    if($insert){
        header('location:stok.php');

    } else {
        echo '
        <script>alert("gagal menambah produk baru");
        window.location.href = "stok.php"
        </script>
        ';
    }
}

// tambah pelanggan
if(isset($_POST['tambahpelanggan'])){
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $gp = $_POST['gambar_pelanggan'];

    $insert = mysqli_query($conn,"insert into pelanggan(nama_pelanggan,gambar_pelanggan,telepon,alamat) values('$nama_pelanggan','$gp','$telepon','$alamat')");

    if($insert){
        header('location:pelanggan.php');

    } else {
        echo '
        <script>alert("gagal menambah pelanggan baru");
        window.location.href = "pelanggan.php"
        </script>
        ';
    }

}


// edit barang
if(isset($_POST['editbarang'])){
    $np = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $stok = $_POST['stok'];
    $idp = $_POST['idp'];

    $query = mysqli_query($conn, "update produk set nama_produk='$np', gambar='$gambar', harga='$harga', stok='$stok' where id_produk='$idp'");
    if($query){
        header('location:stok.php');
    } else {
        echo '
        <script>alert("gagal");
        window.location.href="stok.php"
        </script>
        ';
    }
}

// hapus barang
if(isset($_POST['hapusbarang'])){
    $idp = $_POST['idp'];

    $query = mysqli_query($conn, "delete from produk where id_produk='$idp'");
    if($query){
        header('location:stok.php');
    } else {
        echo '
        <script>alert("gagal");
        window.location.href="stok.php"
        </script>
        '; 
    }
}

// edit pelanggan
if(isset($_POST['editpelanggan'])){
    $npl = $_POST['nama_pelanggan'];
    $gp = $_POST['gambar_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $idpl = $_POST['idpl'];

    $query = mysqli_query($conn, "update pelanggan set nama_pelanggan='$npl', gambar_pelanggan='$gp', alamat='$alamat', telepon='$telepon' where id_pelanggan='$idpl'");
    if($query){
        header('location:pelanggan.php');
    } else {
        echo '
        <script>alert("gagal");
        window.location.href="pelanggan.php"
        </script>
        ';
    }
}

// hapus pelanggan
if(isset($_POST['hapuspelanggan'])){
    $idpl = $_POST['idpl'];

    $query = mysqli_query($conn, "delete from pelanggan where id_pelanggan='$idpl'");
    if($query){
        header('location:pelanggan.php');
    } else {
        echo '
        <script>alert("gagal");
        window.location.href="pelanggan.php"
        </script>
        '; 
    }
}

if(isset($_POST['id_produk'])){

    $id_produk = $_POST['id_produk'];
    $data = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
    echo var_dump($data);
    return false;
    $b = mysqli_fetch_assoc($data);

    $produk = [
        'id' == $b['id_produk'],
        'nama' == $b['nama_produk'],
        'harga' == $b['harga'],
        'jumlah' == 1

       

    ];

    $_SESSION['produk']=$produk;

    header('location:transaksi.php');

  
}


if(isset($_POST['id_pelanggan'])){

    $id_pelanggan = $_POST['id_pelanggan'];
    $data2 = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
    echo var_dump($count);
    return false;
    $p = mysqli_fetch_assoc($count);

    $pelanggan = [
        'id' == $p['id_pelanggan'],
        'nama' == $p['nama_pelanggan'],

       

    ];

    $_SESSION['pelanggan']=$pelanggan;

    header('location:transaksi.php');
}

// if(isset($_POST['tambahtransaksi'])){
//     echo '
//       <script>alert("berhasil masuk");
//       </script>
//       ';
  
//   }

// tambah transaksi
// if(isset($_POST['tambahtransaksi'])){
//     $tanggal= $_POST['tanggal'];
//     $pelanggan = $_POST['pelanggan'];
//     $jumlah_uang= $_POST['jumlah_uang'];
   

//     $insert = mysqli_query($conn,"insert into transaksi(tanggal,pelanggan,jumlah_uang) values('$tanggal','$pelanggan','$jumlah_uang')");

//     if($insert){
//         header('location:transaksi.php');

//     } else {
//         echo '
//         <script>alert("gagal menambah transaksi baru");
//         window.location.href = "transaksi.php"
//         </script>
//         ';
//     }

// }

// if(isset($_POST['calculator'])){
//     $produk = $_POST['produk'];
//     $harga = explode("-",$produk)[0];
//     $id_produk = explode("-",$produk)[1];
//     $jumlah = $_POST['jumlah'];
//     $sumharga = $harga * $jumlah;


// $insert = mysqli_query($conn, "insert into keranjang(id_produk,jumlah,harga,status) values('$id_produk','$jumlah','$sumharga', '1')");
// if($insert){
//    header('location:transaksi.php');

// } else {
//     echo '
//     <script>alert("gagal menambah transaksi baru");
//     window.location.href = "transaksi.php"
//     </script>
//     ';
// }


// }



?>