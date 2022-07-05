<?php
# memulakan fungsi session
session_start();

# memanggil fail guard-hakim.php
include('guard-hakim.php');

# menyemak kewujudan data POST
if(!empty($_POST))
{
	# memanggil fail connection.php
	include('connection.php');
	
	# pengesahan data (validation) idpeserta
	if(strlen($_POST['idpeserta']) != 5)
	{
		die("<script>alert('Ralat idpeserta');
		window.history.back();</script>");
	}
	
	# arahan(query) untuk kemaskini maklumat peserta
	$arahan     =   "update peserta set
	idpeserta             =   '".$_POST['idpeserta']."',
	namapeserta               =   '".$_POST['namapeserta']."',
	passpeserta             =   '".$_POST['passpeserta']."',
	idsekolah               =   '".$_POST['idsekolah']."'
	where
	idpeserta               =   '".$_GET['idpeserta_lama']."' ";
	
	# melaksana dan menyemak proses kemaskini
	if(mysqli_query($condb,$arahan))
	{
		# kemaskini berjaya
		echo "<script>alert('Kemaskini Berjaya');
		window.location.href='senarai-peserta.php';</script>";
	}
	else
	{
		# kemaskini gagal
		echo "<script>alert('kemaskini Gagal');
		window.history.back();</script>";
	}
}
else
{
	#data POST empty
	die("<script>alert('sila lengkapkan data');
	windoe.location.href='hakim-daftar-borang.php';</script>");
}
?>