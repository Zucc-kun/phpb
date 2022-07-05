<?php
#memulakan fungsi session
session_start();
#memanggil fail guard-juri
include('guard-juri.php');
#menyemak kewujudan data POST
if(!empty($_POST))
{
	#memanggil fail connection
	include('connection.php');
	
	#pengesahan data idpeserta dan had atas/bawah
	if(strlen($_POST['idjuri']) !=5 )
	{
		die("<script>alert('ralat pada ID Peserta');
		window.location.href='juri-daftar-borang.php';</script>");
	}
	
	#arahan untuk menyimpan data juri baharu ke dalam jadual juri
	$arahan = "insert into juri
	(idjuri,namajuri,passjuri)
	values
    ('".$_POST['idjuri']."','".$_POST['namajuri']."','".$_POST['passjuri']."')
	";
	
	#melaksanakan arahan simpan dan menguji proses menyimpan data
	if(mysqli_query($condb,$arahan))
	{
		#jika data berjaya disimpan. papar popup berjaya
		echo "<script>alert('pendaftaran Berjaya');
		window.location.href='senarai-juri.php';</script>";
	}
}
else
{
	#jika data POST empty
	die("<script>alert('sila lengkapkan data');
	windows.location.href='juri-daftar-borang.php';</script>");
}

?>