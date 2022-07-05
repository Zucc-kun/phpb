<?php
if (isset($_POST['btn-upload']))
{
	# memanggil fail connection
	include ('connection.php');
	
	# mengambil nama sementara fail
	$namafailsementara=$_FILES["data_peserta"]["tmp_name"];
	
	# memanggil nama fail
	$namafail=$_FILES['data_peserta']['name'];
	
	# memanggil jenis fail
	$jenisfail=pathinfo($namafail,PATHINFO_EXTENSION);
	
	# menguji jenis fail dan saiz fail
	if($_FILES["data_peserta"]["size"]>0 AND $jenisfail=="txt")
	{
		#  membuka fail yang diambil
		$fail_data_peserta=fopen($namafailsementara,"r");
		
		# mendapatkan data dari fail baris demi baris
		while (!feof($fail_data_peserta))
		{
			# mengambil data sebaris sahaja bagi setiap pusingan
			$ambilbarisdata = fgets($fail_data_peserta);
			
			# memecahkan baris data mengikut tanda pipe
			$pecahkanbaris = explode("|",$ambilbarisdata);
			
			# selepas pecahan tadi akan diumpukkan kepada 3
			list($kodpeserta,$namapeserta,$kodsekolah,$passwordpeserta) = $pecahkanbaris;
			
			# arahan SQL untuk menyimpan data
			$arahan_sql_simpan="insert into peserta
			(idpeserta,namapeserta,idsekolah,passpeserta) values
			('$idpeserta','$namapeserta','$idsekolah','$passpeserta')";
			
			# memasukkan data ke dalam jadual peserta
			$laksana_arahan_simpan=mysqli_query($condb,$arahan_sql_simpan);
			echo"<script>alert<'Import fail data Selesai');
			window.location.href='senarai-peserta.php';</script>";
			
		}
	fclose($fail_data_peserta);
	}
	else
	{
		echo"<script>alert('Hanya fail berformat txt sahaja diterima.');</script>";
	}
}
else
{
	die("<script>alert('Ralat! Akses secara terus.');
	window.location.href='peserta-upload-borang.php';</script>");
}
?>