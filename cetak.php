<?php
include 'ceklogin.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>cetak laporan penjualan</title>
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
 
		<h2>LAPORAN DATA PENJUALAN</h2>
 
	</center>
 <section class="panel">
							<div class="panel-body">
                            <table border="1" style="width: 100%">
							<thead>
										<tr>
										<th class="text-center">NO</th>
											<th class="text-center">ID Transaksi</th>
											<th class="text-center">Nama Produk</th>
											<th class="text-center">Jumlah Produk</th>
											<th class="text-center">Total Bayar</th>
											<th class="text-center">Jumlah Uang</th>
											<th class="text-center">Pelanggan</th>
											<th class="text-center">Tanggal</th>
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
                        <td align="center"><?php echo $row[0];?></td>
                        <td align="center"><?php echo $row[1]; ?></td>
                        <td align="center"><?php echo $row[2]; ?></td>
                        <td align="center"><?php echo $row[3]; ?></td>
                        <td align="center"><?php echo $row[4]; ?></td>
                        <td align="center"><?php echo $row[5]; ?></td>
                        <td align="center"><?php echo $row[6]; ?></td>
                      </tr>
                      <?php
                      $no++;
                      }
                       ?>
                    </tbody>
								</table>
							</div>
						</section><br><br>

            <h4 align="right"  style="margin-right: 18px;">Mengetahui,</h4><br>
            <h4 align="right">Admin Fito Store</h4>
            <p align="right" style="margin-right: 20px;">Fito Satrio</p>

		<script>
			window.print();
		</script>
        </body>
        </html>

  


 