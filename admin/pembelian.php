
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <h5 class="heading-title">Halaman Pembelian</h5>
           


  <div class="row">
      <div class="col col-lg-12">
		<div class="table-responsive m-b-40">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pelanggan</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th style="text-align: center">Aksi</th>
				</tr>
			</thead>

			<tbody>
			<?php $no = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan"); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
			
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $pecah['nama_pelanggan']; ?></td>
					<td><?php echo $pecah['tanggal_pembelian'];  ?></td>
					<td><?php echo $pecah['status']; ?></td>
					<td><?php echo "Rp. ".$pecah['total_pembelian']; ?></td>
					<td>
						 <div class="table-data-feature">
                                 
                               <?php if ($pecah['status'] == "Pending" || $pecah['status'] == "Produk di Terima") : ?>
                               		<a class="btn btn-outline-primary btn-block" href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>">Detail</a> 
                             	<?php endif; ?>
								                               
                             
                               <?php if ($pecah['status'] == "Menunggu Konfirmasi" || $pecah['status'] == "Sedang di Kirim"): ?>

                               		<a class="btn btn-outline-primary" href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>">Detail</a> 

                               		  &nbsp;

                               		<a class="btn btn-outline-success" href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>">Bayar</a>     
                               <?php endif; ?>
                               		
                               
                                     
                         </div>

					</td>
				</tr>
			<?php $no++; ?>
			<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>