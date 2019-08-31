<h1>Detail Pembelian</h1>

<?php 
	
	$ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan
							  ON tb_pembelian.id_pelanggan = tb_pelanggan.id_pelanggan
							  WHERE tb_pembelian.id_pembelian = '$_GET[id]'");

	$detail = $ambil->fetch_assoc();

 ?>

 <pre>
 	<?php
 	 //print_r($detail);
	 ?>
 </pre>

<div class="container">
		<strong>
			<?php echo " Nama Pelanggan : ".$detail['nama_pelanggan']; ?>
			<br>
			<?php echo"Total Pembelian : Rp. " .$detail['total_pembelian']; ?>
		</strong>

		 <p>
		 	<?php echo "Telepon : " .$detail['telepon']; ?>
		 	<br>
		 	<?php echo "E-Mail : " .$detail['email'] ?>
		 	<br>
		 	<?php echo "Alamat : " .$detail['alamat']; ?>
		 </p>
</div>



  <div class="row m-t-30">
      <div class="col-md-12">
		<div class="table-responsive m-b-40">
		<table class="table table-borderless table-data3">
			<thead class="thead light">
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>SubTotal</th>
				</tr>
			</thead>

			<tbody>
			<?php $no = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM tb_pembelian_produk JOIN tb_produk ON 
											tb_pembelian_produk.id_produk = tb_produk.id_produk
											WHERE tb_pembelian_produk.id_pembelian = '$_GET[id]'"); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
			
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $pecah['nama_produk']; ?></td>
					<td><?php echo "Rp. " .$pecah['harga_produk'];  ?></td>
					<td><?php echo $pecah['jumlah']; ?></td>
					<td><?php echo "Rp. ".$pecah['harga_produk']*$pecah['jumlah']; ?></td>
				</tr>
			<?php $no++; ?>
			<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>