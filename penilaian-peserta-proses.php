<?php
# memulakan fungsi session
session_start();

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-peserta
if(empty($_GET)){
die("<script>window.location.href='penilaian-peserta.php';</script>");
}

# memanggil fail connection.php
include('connection.php');

# mengambil markah peserta
foreach ($_POST as $key  =>  $jumlah)
{
	# mengambil nilai primary key yang dihantar
	$idpenilaian   =   ltrim($key,"k");
	
	    # Data validation dan had atas / bawah
	if(($jumlah>50 or $jumlah<0)or !is_numeric($jumlah))
	{
		die("<script>alert('Ralat pada data jumlah');
		window.history.back();</script>");
	}
	
	# arahan kewujudan jumlah markah peserta di dalam jadual keputusan
	$semak_jumlah   =   "select* from keputusan
	where  
	        idpeserta    =   '".$_GET['idpeserta']."'
	and	    idpenilaian =   '$idpenilaian'
    limit 1 ";
		
		# laksana arahan semak kewujudan jumlah markah
		$laksana_semak  =  mysqli_query($condb, $semak_jumlah) or die(mysqli_error($condb));
		
		# Jika data jumlah markah peserta telah wujud dalam jadual keputusan
		if(mysqli_num_rows($laksana_semak)==1)
		{
			# menyediakan arahan (query) kemaskini jumlah markah peserta
			$arahan = "update keputusan
			set
			jumlah        =   '$jumlah'
			where
			idpeserta    =   '".$_GET['idpeserta']."'
			and
			idpenilaian =   '$idpenilaian'
			";
		}
		else
		{
			# menyediakan arahan(query) untuk menyimpan data jumlah markah baru peserta
			$arahan = " insert into keputusan
			(idjuri, idpeserta, idpenilaian, jumlah)
			values
			('".$_SESSION['idjuri']."','".$_GET['idpeserta']."','$idpenilaian','$jumlah')
			";
		}
		
		$result = mysqli_query($condb,$arahan) or die(mysqli_error($condb));
		# melaksanakan arahan kemaskini / simpan
		if($result)
		{
		echo "test1";
			# jika proses kemaskini / simpan berjaya
		echo "<script>alert('Markah berjaya disimpan');
		window.location.href='penilaian-peserta.php'; </script>";
		}
		else
		{
		echo "test2";
			# jika proses kemaskini / simpan gagal
			echo "<script>alert('Markah gagal disimpan');
			window.history.back(); </script>";
		}
}
?>

