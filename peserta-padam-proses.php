<?php
# memulakan fungsi session
session_start();

# memanggil fail guard-juri.php
include('guard-juri.php');

# menyemak kewujudan data GET idpeserta
if(!empty($_GET))
{
	#memanggil fail connection 
	include('connection.php');
	
	#arahan untuk memadam data peserta berdasarkan idpeserta yang di hantar
	$arahan = "delete from peserta where idpeserta='".$_GET['idpeserta']."'";
	
	# melaksanakan arahan dan menguji proses padam rekod
	if(mysqli_query($condb,$arahan))
	{
		#jika data berjaya dipadam 
		echo "<script>alert('Padam data Berjaya');
		window.history.href='senarai-peserta.php';</script>";
	}
	else
	{
		#jika data gagal dipadam
		echo "<script>alert('padam data gagal');
		window.history.back();</script>";
	}
}
else
{
	#jika data GET tidak wujud
	die("<script>alert('Ralat! akses secara terus');
	window.location.href='senarai-peserta.php';</script>");
}
?>