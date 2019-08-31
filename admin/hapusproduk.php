<?php 

	$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	$fotoproduk = $pecah['foto_produk'];
	if (file_exists("../images/$fotoproduk")) {
		unlink("../images/$fotoproduk");
	}

	$koneksi->query("DELETE FROM tb_produk WHERE id_produk='$_GET[id]'");

	echo "<script>alert('Produk Berhasil di Hapus');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";



 ?>

