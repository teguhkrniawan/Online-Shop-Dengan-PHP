<?php 

	$koneksi = new mysqli("localhost", "root", "","db_toko");
	$ambildata = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM provinsi WHERE id_prov='$_GET[id_prov]'"));
	$data_ongkir = array('ongkir'   =>  $ambildata['ongkir']);
    
 	echo json_encode($data_ongkir);
?>