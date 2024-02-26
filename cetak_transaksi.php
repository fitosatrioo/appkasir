<?php
include 'ceklogin.php';

$id   = $_GET['id_transaksi'];
$sql     = "SELECT * FROM laporan WHERE id_transaksi = '".$id."'";
$query   = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_row($query)) {
$id	= $row[0];
$nama	= $row[1];
$jumlah	= $row[2];
$total 	= $row[3];
$uang 	= $row[4];
$pelanggan    	= $row[5];
$tanggal    	= $row[6];
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>cetak data transaksi</title>
</head>
<body>

<table>
  <tr>
    <td><img src="img/header.png" width="610px" height="180px"></td>

  </tr>
</table><hr> 
 <br/>
 <p>
	<center>
		<h2>ID Transaksi : <?php echo $_GET['id_transaksi']; ?></h2>
 
	</center>
 <section class="panel">
							<div class="panel-body">
                            <table border="1" style="width: 100%">
												<th class="text-center">Nama Produk</th>
												<td align="center"><?php echo "$nama"; ?></td>
											</tr>
												<th class="text-center">Jumlah Produk</th>
												<td align="center"><?php echo "$jumlah"; ?></td>
											</tr>
												<th class="text-center">Total Bayar</th>
												<td align="center"><?php echo "$total"; ?></td>
											</tr>
												<th class="text-center">Jumlah Uang</th>
												<td align="center"><?php echo "$uang"; ?></td>
											</tr>
												<th class="text-center">Pelanggan</th>
												<td align="center"><?php echo "$pelanggan"; ?></td>
											</tr>
												<th class="text-center">Tanggal</th>
												<td align="center"><?php echo "$tanggal"; ?></td>
											</tr>
								</table>
							</div>
						</section><br><br>

            <h4 align="right"  style="margin-right: 20px;"> Mengetahui,</h4><br>
            <h4 align="right">Admin Fito Store</h4>
            <p align="right" style="margin-right: 18px;">Fito Satrio</p>

		<script>
			window.print();
		</script>
        </body>
        </html>