<?php
# memulakan fungsi session 
session_start();

# menyemak kewujudan data post yang dihantar dari peserta-login-borang.php
if(!empty($_POST['idjuri'] and !empty($_POST['passjuri'])))
{
	# jika data yang dihantar tidal empty
	
	# memanggil fail connection.php
	include ('connection.php');
	
	# Arahan(query) untuk membandingkan data yang dimasukkan
	$query_login = "select * from juri
	where
	        idjuri                =   '".$_POST['idjuri']."'
	and     passjuri              =   '".$_POST['passjuri']."' ";

	
	# melaksankan arahan membandingkan data
	$laksana_query = mysqli_query($condb,$query_login);
	
	# jika terdapat 1 data yang sepadan , login berjaya
	if(mysqli_num_rows($laksana_query)==1)
	{
		#mengambil data yang ditemui
		$m = mysqli_fetch_array($laksana_query);
		
		#mengumpukkan kepada pembolehubah session
		$_SESSION['idjuri'] = $m['idjuri'];
		$_SESSION['namajuri'] = $m['namajuri'];
		$_SESSION['tahap'] = "juri";
		
		# membuka laman juri-menu-.php
		echo"<script>window.location.href='juri-menu.php';</script>";
	}
	else
	{
		#login gagal. kembali ke laman juri-signup-borang.php
		die("<script>alert('Login gagal');
		window.location.href='juri-login-borang.php';</script>");
    }

}
else
{
	#data yang dihantar dari laman juri-signup-borang.php kosong
		die("<script>alert('sila masukkan idpeserta dan password');
		window.location.href='juri-login-borang.php';</script>");
}

?>