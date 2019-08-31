<?php  
  session_start();
  $koneksi = new mysqli("localhost", "root", "","db_toko");
  
  if (!isset($_SESSION["keranjang"])) {
    echo "<script>alert('Silahkan Pilih Produk Lebih Dahulu');</script>";
    echo "<script>location='index.php';</script>";
   } 

  if (empty($_SESSION["keranjang"])) {
    echo "<script>alert('Silahkan Pilih Produk Lebih Dahulu');</script>";
    echo "<script>location='index.php';</script>";
   } 
 
 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>SIX-TEE OLSHOP</title>
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
            <li class="nav-item active">
              <a class="nav-link" href="keranjang.php">Keranjang <span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="checkout.php">Checkout</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </div>
  </nav>

  <br>

  <!-- KONTEN -->

  <div class="container">
          <table class="table">
          
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Produk</th>
              <th scope="col">Harga</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Sub Harga</th> 
              <th scope="col">Aksi</th>             
            </tr>
          </thead>

          <?php 
            $no = 1;
            foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :  ?>

            <?php 
             
              $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
              $pecah = $ambil->fetch_assoc();
            ?>

                <tbody>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $pecah['nama_produk']; ?></td>
                    <td><?= "Rp ".number_format($pecah['harga_produk']); ?></td>
                    <td><?= $jumlah ?></td>
                    <?php $subtotal = $pecah['harga_produk']*$jumlah ?>
                    <td><?= "Rp ".number_format($subtotal); ?></td>
                    <td><a class="btn btn-danger" href="hapuskeranjang.php?id=<?php echo $id_produk ?> ">Hapus</td>
                  </tr>
                </tbody>
              <?php $no++; ?>
        <?php endforeach ?>
        </table>
        <a class="btn btn-primary" href="index.php" >Kembali Belanja</a>
        <a class="btn btn-success" href="checkout.php" >CheckOut</a>
    </div> 

<!-- KONTEN -->
   

 



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>