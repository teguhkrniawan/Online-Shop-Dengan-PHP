
<!DOCTYPE html>
<html>
<head>
		  <!-- Required meta tags-->
		  <meta charset="UTF-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		  <meta name="description" content="au theme template">
		  <meta name="author" content="Hau Nguyen">
		  <meta name="keywords" content="au theme template">

		  <!-- Title Page-->
		  <title>Grid System</title>

		  <!-- Fontfaces CSS-->
		  <link href="css/font-face.css" rel="stylesheet" media="all">
		  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
		  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
		  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

		  <!-- Bootstrap CSS-->
		  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

		  <!-- Vendor CSS-->
		  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
		  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
		  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
		  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
		  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
		  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
		  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

		  <!-- Main CSS-->
		  <link href="css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
 <div class="page-wrapper">

	<div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">

          	<?php 

          		$id_pembelian = $_GET['id'];
          		$ambil = $koneksi->query("SELECT * FROM tb_pembayaran WHERE id_pembelian='$id_pembelian'");
          		$pecah = $ambil->fetch_assoc();

          		//echo "<pre>".print_r($pecah)."<pre>";

          	?>


          	 <div class="row">
              
              <div class="col-lg-8">
                <section class="card">
                  <div class="card-body text-secondary">
                  	<table class="table table-top-campaign">
                  	 <h3 class="title-3 m-b-30">Info Pembayaran</h3>
                  		<tbody>

                  			<tr>
                  				<td>Nama</td>
                  				<td><?= $pecah['nama']; ?></td>
                  			</tr>

                  			<tr>
                  				<td>Bank Pengiriman</td>
                  				<td><?= $pecah['bank']; ?></td>
                  			</tr>	
                  			
                  			<tr>
                  				<td>Jumlah Pembayaran</td>
                  				<td><?php echo "Rp." .number_format($pecah['jumlah']); ?></td>
                  			</tr>

                  			<tr>
                  				<td>Tanggal Pembayaran</td>
                  				<td><?= $pecah['tanggal']; ?></td>
                  			</tr>
                  		</tbody>
                  	</table>
                  </div>
                </section>
              </div>
              <div class="col">
                <section class="card">
                  <div class="card-body text-secondary">
                  	<img width="250px" height="180px" align="left" src="../foto_bukti/<?= $pecah['bukti']; ?>">
                  </div>
                </section>
              </div>
              
            </div>

            <form method="POST">
            <div class="row">
            	<div class="col-lg-12">
            		<section class="card">
            			<div class="card-body text-secondary">
            				<label>Ubah Status</label>
            				<select class="form-control" name="status">
            					<option value="Sedang di Kirim">Sedang di Kirim</option>
            					<option value="Produk di Terima">Produk di Terima</option>
            				</select>
            				<br>
            				<button class="btn btn-success" name="konfirmasi">Konfirmasi</button>
            			</div>
            		</section>
            	</div>
            </div>
            </form>
          </div>
        </div>
    </div>
</div>


	<?php 
		if (isset($_POST['konfirmasi'])) {
			$status = $_POST['status'];

			$koneksi->query("UPDATE tb_pembelian SET status = '$status' WHERE id_pembelian='$id_pembelian'");
			echo "<script>alert('Data Pembelian Berhasil di Update');</script>";
			echo "<script>location = 'index.php?halaman=pembayaran';</script>";
		}
		

	?>


</body>

</html>