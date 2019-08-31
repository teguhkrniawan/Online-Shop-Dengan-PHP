<h1>Halaman Pelanggan</h1>
    

  <div class="row m-t-30">
      <div class="col-md-12">
		<div class="table-responsive m-b-40">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pelanggan</th>
					<th>E-Mail</th>
					<th>Telepon</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
			<?php $no = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM tb_pelanggan"); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
			
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $pecah['nama_pelanggan']; ?></td>
					<td><?php echo $pecah['email']; ?></td>
					<td><?php echo $pecah['telepon']; ?></td>
					<td>
						 <div class="table-data-feature">
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="#">
                                     <i class="zmdi zmdi-edit"></i> 
                                 </a>
                                 <span><span><span></span></span></span>
                                 <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="#">
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