

<?php 

if (isset($_POST['submit'])) {
	$namafoto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../images/".$namafoto);

	$koneksi -> query("INSERT INTO tb_produk 
				  (nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk)
				   VALUES ('$_POST[nama_produk]', '$_POST[harga_produk]', '$_POST[berat_produk]', '$namafoto' 
				           ,'$_POST[deskripsi]')");

	echo "<script>alert('Data Sukses di Simpan');</script> " ;

	echo "<script>location = 'index.php?halaman=produk';</script>";
	} 	
?>





<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<strong>Form Input Produk</strong>
		</div>

		<div class="card-body card-block">
			<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">  
				
				<!-- Baris 1 -->
				<div class="row form-group">
					<div class="col col-md-3">
						<label class=" form-control-label">Nama Produk</label>
					</div>

					<div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="nama_produk" placeholder="Nama Produk" class="form-control">
                        <small class="form-text text-muted">*ex : Baju Tidur Kekinian</small>
                    </div>
				</div>
				<!-- Baris 1 -->

				<!-- Baris 2 -->
				<div class="row form-group">
					<div class="col col-md-3">
						<label class=" form-control-label">Harga Produk</label>
					</div>

					<div class="col-12 col-md-9">
                        <input type="number" id="text-input" name="harga_produk" placeholder="Harga Produk" class="form-control">
                        <small class="form-text text-muted">*ex : 125000</small>
                    </div>
				</div>
				<!-- Baris 2 -->

				<!-- Baris 3 -->
				<div class="row form-group">
					<div class="col col-md-3">
						<label class=" form-control-label">Berat Produk</label>
					</div>

					<div class="col-12 col-md-9">
                        <input type="number" id="text-input" name="berat_produk" placeholder="Berat Produk" class="form-control">
                        <small class="form-text text-muted">*Dalam Satuan Gram, ex: 1000</small>
                    </div>
				</div>
				<!-- Baris 3 -->

				<!-- Baris4 -->
				<div class="row form-group">
                     <div class="col col-md-3">
                         <label for="textarea-input" class=" form-control-label">Deskripsi</label>
                      </div>
                      
                      <div class="col-12 col-md-9">
                        <textarea name="deskripsi" id="textarea-input" rows="7" placeholder="Content..." 
                        class="form-control"></textarea>
                      </div>
                </div>
				<!-- Baris4 -->

				<!-- Baris 5 -->
				 <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Upload Foto</label>
                     </div>
                     <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="foto" class="form-control-file">
                        <small class="form-text text-muted">*Format gambar dalam bentuk .Jpg atau .PNG (Max 2MB)</small>
                    </div>
                </div>	
				<!-- Baris 5 -->	

				</div>
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary btn-sm" name="submit">
                     <i class="fa fa-dot-circle-o"></i> Submit
                     </button>
                                       
                     <button type="reset" class="btn btn-danger btn-sm">
                     <i class="fa fa-ban"></i> Reset
                     </button>
                </div>			
			</form>
		</div>		
	</div>
</div>

