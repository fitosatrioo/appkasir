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
    $satuan= $_POST['satuan'];
   

    $insert = mysqli_query($conn,"insert into produk(nama_produk,gambar,harga,satuan) values('$nama_produk','$gambar','$harga','$satuan')");

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

if(isset($_POST['tambahkeranjang'])){
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    $data = mysqli_query($conn, "select * from produk where id_produk='$id_produk'");
    $p = mysqli_fetch_assoc($data);
    $produk = [
        'id' => $p['id_produk'],
        'nama' => $p['nama_produk'],
        'harga' => $p['harga'],
        'jumlah' => $jumlah
        
    ];
    
    $total =$p['harga'] * $jumlah;
    $nama = $p['nama_produk'];
    
    $insert = mysqli_query($conn,"insert into transaksi(nama_produk,jumlah,total_bayar) values('$nama','$jumlah','$total')");

    if($insert){
        header('location:transaksi.php');

    } else {
        echo '
        <script>alert("gagal menambah transaksi baru");
        window.location.href = "transaksi.php"
        </script>
        ';
    }


}

// tambah transaksi
if(isset($_POST['tambahtransaksi'])){
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];
    $uang = $_POST['uang'];
    $pelanggan = $_POST['pelanggan'];

    $insert = mysqli_query($conn,"insert into laporan(nama_produk,jumlah,total_bayar,jumlah_uang,pelanggan) values('$nama','$jumlah','$total','$uang','$pelanggan')");

    if($insert){
        header('location:laporan.php');

    } else {
        echo '
        <script>alert("gagal menambah transaksi baru");
        window.location.href = "laporan.php"
        </script>
        ';
    }

}

// hapus transaksi
if(isset($_POST['hapustransaksi'])){
    $id = $_POST['idt'];

    $query = mysqli_query($conn, "delete from transaksi where id_transaksi='$id'");
    if($query){
        header('location:transaksi.php');
    } else {
        echo '
        <script>alert("gagal");
        window.location.href="transaksi.php"
        </script>
        '; 
    }
}

// hapus laporan
if(isset($_POST['hapuslaporan'])){
    $id = $_POST['idt'];

    $query = mysqli_query($conn, "delete from laporan where id_transaksi='$id'");
    if($query){
        header('location:laporan.php');
    } else {
        echo '
        <script>alert("gagal");
        window.location.href="laporan.php"
        </script>
        '; 
    }
}

// edit barang
if(isset($_POST['editbarang'])){
    $np = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $satuan = $_POST['satuan'];
    $idp = $_POST['idp'];

    $query = mysqli_query($conn, "update produk set nama_produk='$np', gambar='$gambar', harga='$harga', satuan='$satuan' where id_produk='$idp'");
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




?>



