<?php 
	session_start();

	session_destroy();
	echo "<script>alert('Anda Berhasil Log Out');</script>";
	echo "<script>location='index.php';</script>";
 ?>