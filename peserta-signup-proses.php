<?php
#memulakan fungsi session
session_start();

#menyemak kewujudan data POST
if(!empty($_POST))
{
	#jika data POST wujud
	
	#panggil fail connection.php
	include('connection.php');
	
	# Data   Validation   Had Atas & had bawah
    if(strlen($_POST['idpeserta']) !=5)
 {
    die("<script>alert('Ralat Pada ID Peserta');
    window.location.href='peserta-signup-borang.php';</script>");
 }
    # Arahan (Query) untuk menyimpan data Peseta baru
    $query_login = "insert into peserta
    (idpeserta,namapeserta,idsekolah,passpeserta)
    values
	('".$_POST['idpeserta']."','".$_POST['namapeserta']."','".$_POST['idsekolah']."','".$_POST['passpeserta']."')
	";
	
	# Melaksanakan Arahan Menyimpan data Peseta baru
	$laksana_query = mysqli_query($condb,$query_login);
	
	#menyemak proses penyimpanan data
	if($laksana_query)
	{
		#Jika data berjaya disimpan
		die("<script>alert('Pendaftaran Berjaya, Sila login untuk melihat keputusan');
		window.location.href='peserta-signup-borang.php';</script>");
	}
	else
	{
		#Jika data gagal disimpan
		die("<script>alert('Pendaftaran gagal');
		window.location.href='peserta-signup-borang.php';</script>");
    }

}
else
{
	#jika data POST tidak wujud (empty)
		die("<script>alert('sila lengkap maklumat berikut');
		window.location.href='peserta-signup-borang.php';</script>");
}

?>