<?php 
include 'ceklogin.php';
if(isset($_POST['id_produk'])){
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
    $_SESSION['cart'][]=$produk;

    header('location:transaksi.php');

}
if(isset($_POST['tambahkeranjang'])){
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    $data = mysqli_query($conn, "select * from produk where id_produk='$id_produk'");
    $p = mysqli_fetch_assoc($data);
    $sumharga = 0;
    $produk = [
        'id' => $p['id_produk'],
        'nama' => $p['nama_produk'],
        'harga' => $p['harga'],
        'jumlah' => $jumlah
        
    ];
    
    $total =(int)$p['harga'] * (int)$jumlah;
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


?>