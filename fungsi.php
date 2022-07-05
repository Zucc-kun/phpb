<?php
# Fungsi untuk memaparkan drop down nama sekolah
function senarai_sekolah(){
	include('connection.php');
	$arahan = "Select* from sekolah";
	$laksana=mysqli_query($condb,$arahan);
	$list="";
	while($m=mysqli_fetch_array($laksana))
	{
		$list=$list."<option value='".$m['idsekolah']."'>
		".$m['namasekolah']."</option>";
	}
	return $list;
}

# mencari markah individu
function markah_individu($idpeserta){
	include('connection.php');
	$arahan_markah = "select sum(jumlah) as jumlah
	from keputusan
	where idpeserta='$idpeserta'";
	
	$laksana_markah = mysqli_query($condb,$arahan_markah) or die(mysqli_error($condb));
	$m = mysqli_fetch_array($laksana_markah);
	return $m['jumlah'];
}

function semak(){
	include('connection.php');
	#arahan mendapatkan  bilangan markah sepatutnya
	$arahan_sebenar      = "SELECT 
	(SELECT COUNT(*) AS bilangan FROM peserta)*
	(SELECT COUNT(*) AS bil FROM penilaian) AS jumlah";
	$laksana_sebenar     =    mysqli_query($condb,$arahan_sebenar) or die(mysqli_error($condb));
	$sb    =   mysqli_fetch_array($laksana_sebenar);
	
	#arahan untuk mendapatkan jumlah markah yang telah dimasukkan hakim
	$arahan_semasa  = "SELECT COUNT(*) AS bil FROM keputusan";
	$laksana_semasa = mysqli_query($condb,$arahan_semasa) or die(mysqli_error($condb));
	$ss             = mysqli_fetch_array($laksana_semasa);
	
	if($ss['bil']!=$sb['jumlah'])
	{
		 $umum = "Penilaian peserta belum selesai.<br>
		 Keputusan Rasmi Tidak Dikeluarkan lagi";
	}
	else
	{
		$umum = "Semua peserta telah dinilai.";
	}
	
	return $umum;
}
function keputusan_individu(){
	include('connection.php');
	echo" <table width= '100%' border='1' id='saiz'>
	<tr>
	    <td>Kedudukan</td>
		<td>Nama</td>
		<td>Sekolah</td>
		<td>Jumlah Markah</td>
	</tr>";
# arahan query untuk mencari 3 peserta mendapat markah tertinggi 
$arahan_papar ="SELECT peserta.idpeserta, peserta.namapeserta, sekolah.namasekolah,
SUM(keputusan.jumlah) AS jumlah FROM peserta 
JOIN sekolah ON peserta.idsekolah =sekolah.idsekolah
left JOIN keputusan ON peserta.idpeserta = keputusan.idpeserta
GROUP BY keputusan.idpeserta order by jumlah DESC limit 3 ";

# laksanakan arahan mencari data peserta 
$laksana = mysqli_query($condb,$arahan_papar) or die(mysqli_error($condb));
$bil=0;
# Mengambil data yang ditemui 
    while($m=mysqli_fetch_array($laksana))
    {
        # memaparkan senarai nama dalam jadual
        echo"<tr>
                <td>".++$bil."</td>
	            <td>".$m['namapeserta']."</td>	
                <td>".$m['namasekolah']."</td>
                <td>".$m['jumlah']."</td>
             </tr>";	
	}
echo "</table>";
}

function keputusan_sekolah(){
    include('connection.php');
    echo "<table width='100%' border='1' id='saiz'>	
	<tr>
	    <td>Kedudukan</td>
		<td>Sekolah</td>
		<td>Jumlah Markah</td>
	</tr>";
	
# arahan query untuk mencari jumlah markah terkumpul bagi setiap sekolah
$arahan_papar="SELECT sekolah.namasekolah, SUM(keputusan.jumlah) AS jumlah
FROM peserta JOIN sekolah ON peserta.idsekolah = sekolah.idsekolah
left JOIN keputusan ON peserta.idpeserta = keputusan.idpeserta
GROUP BY peserta.idsekolah order by jumlah DESC ";

# laksanakan arahan mencari
$laksana = mysqli_query($condb,$arahan_papar) or die(mysqli_error($condb));
$bil=0;
# Mengambil data yang ditemui
    while($m=mysqli_fetch_array($laksana)){
		# memaparkan senarai nama sekolah dalam jadual
		echo"<tr>
		    <td>".++$bil."</td>
			<td>".$m['namasekolah']."</td>
			<td>".$m['jumlah']."</td>
		</tr>";
	}
echo "</table>";
}
?>