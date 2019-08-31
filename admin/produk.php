<h1 style="text-align: center;">Halaman Produk</h1>

	<br>
	
	 <div class="col-md-6 col-md-6">
           <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="index.php?halaman=tambahproduk">
            	<i class="zmdi zmdi-plus"></i>Tambah Produk
            </a>                                 
     </div>
    

  <div class="row m-t-30">
      <div class="col-md-12">
		<div class="table-responsive m-b-40">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga Produk</th>
					<th>Berat</th>
					<th>Foto</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
			<?php $no = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM tb_produk"); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
		
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $pecah['nama_produk']; ?></td>
					<td><?php echo $pecah['harga_produk'];  ?></td>
					<td><?php echo $pecah['berat_produk']. " gram"; ?></td>
					<td>
						<img src="../images/<?php echo $pecah['foto_produk']; ?>" width="100" >
					</td>
					<td>
						 <div class="table-data-feature">
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>">
                                     <i class="zmdi zmdi-edit"></i> 
                                 </a>
                                 <span><span><span></span></span></span>
                                 <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>">
                                <i class="zmdi zmdi-delete"></i>
                                </a>                          
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