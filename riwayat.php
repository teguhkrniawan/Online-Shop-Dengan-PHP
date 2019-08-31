<?php 

	session_start();
 	$koneksi = new mysqli("localhost", "root", "","db_toko");
	
?>


<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<title>SIXTEE OLSHOP</title>
</head>
<body>

<!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container">
        <a class="navbar-brand" href="#">SIXTEE SHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Beranda </a>
            </li>
            <li>
              <a class="nav-link" href="keranjang.php">Keranjang <span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="checkout.php">Checkout</a>
            <?php if (isset($_SESSION["pelanggan"])) : ?>
              </li>

              <li class="nav-item active">
              	<a href="riwayat.php" class="nav-link">Riwayat</a>
              </li>

               <li >
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>

           <?php else:  ?>
             </li>
               <li >
                <a class="nav-link" href="login.php">Login</a>
              </li>
           <?php endif ?>
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </div>
  </nav>

  <br>
<!-- NAVBAR -->

<!-- KONTEN -->


<div class="container">

	<h4>Riwayat Belanja</h4>

	<table class="table table-bordered">
	  
	  <thead>
	    <tr>
	      <th scope="col">No</th>
	      <th scope="col">Tanggal</th>
	      <th scope="col">Total Belanja</th>
	      <th scope="col">Status</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>

	  <?php 
	  	$no = 1;
		$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan']; 
		$ambil = $koneksi->query("SELECT * FROM tb_pembelian WHERE id_pelanggan='$id_pelanggan'");
		while ($pecah = $ambil->fetch_assoc()) {
	  ?>

	  <tbody>
	  	<tr>
	  		<td><?php echo $no; ?></td>
	  		<td><?php echo $pecah['tanggal_pembelian']; ?></td>
	  		<td><?php echo "Rp." .number_format($pecah['total_pembelian']); ?></td>
	  		<td><?php echo $pecah['status'] ?></td>
	  		<td style="text-align: center">
          <?php if ($pecah['status'] == 'Sedang di Kirim' || $pecah['status'] == 'Produk di Terima') :?>
              <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-primary btn-block">DETAIL</a>
          <?php endif; ?>

          <?php if ($pecah['status'] == 'Menunggu Konfirmasi' || $pecah['status'] == 'Pending' ) :?>
                <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-primary">DETAIL</a>
          <a href="pembayaran.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-success">BAYAR</a>
          <?php endif; ?>

	  		
	  		</td>
	  	</tr>
	  </tbody>
	  <?php $no++; ?>
	  <?php } ?>

	</table>
</div>


<!-- KONTEN -->






 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>