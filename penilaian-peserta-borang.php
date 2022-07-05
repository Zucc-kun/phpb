<?php
# memulakan fungsi session
session_start();

# menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-peserta
if(empty($_GET)){
die("<script>window.location.href='penilaian-peserta.php';</script>");
}

# memanggil fail header, guard-hakim dan connection
include('header.php');
include('guard-juri.php');
include('connection.php');
?>
<!-- Tajuk Laman -->
<h3>Senarai Peserta</h3>
<a href='penilaian-peserta.php'>Senarai Nama Peserta</a>

<?php
# arahan query untuk mencari senarai nama peserta
$arahan_papar="select* FROM keputusan
where idpeserta ='".$_GET['idpeserta']."'";

# laksanakan arahan mencari data peserta
$laksana = mysqli_query($condb,$arahan_papar) or die(mysqli_error($condb));

# mengambil data peserta yang ditemui
$p   = mysqli_fetch_array($laksana);

?>

<form action='penilaian-peserta-proses.php?idpeserta=<?=$_GET['idpeserta']?>'
method='POST'>

<!-- Memaparkan data get yang diterima -->
<table border='1' width='50%'>
    <tr>
	    <td>Id Peserta</td>
		<td><?=$_GET['idpeserta']?></td>
	</tr>
	<tr>  
	    <td>Nama Peserta</td>
		<td><?=$_GET['namapeserta']?></td>
	</tr>
	<tr>
	    <td>Sekolah Peserta</td>
		<td><?= $_GET['namasekolah']?></td>
	</tr>
	<tr>
	     <td colspan='2' bgcolor='red'>Penilaian</td>
	</tr>
<?php
        # query untuk mencari data kategori dan juga markah murid jika ada
		$arahan_penilaian  = "SELECT
		penilaian.idpenilaian,
		penilaian.aspek,
		keputusan.jumlah
		FROM penilaian
		LEFT JOIN keputusan
		ON penilaian.idpenilaian  =   keputusan.idpenilaian
		AND keputusan.idpeserta    =   '".$_GET['idpeserta']."' ";
		
		# melaksanakan arahan mencari
		$laksana_penilaian  = mysqli_query($condb,$arahan_penilaian) or die(mysqli_error($condb));
		
		# mengambil SEMUA data yang ditemui
		while($m=mysqli_fetch_array($laksana_penilaian))
		{
			    $kod="k".$m['idpenilaian'];
		?>
		    <!-- Umpukan markah yang sedia ada ke dalam text box -->
		<tr>
		    <td><?=$m['aspek'] ?></td>
		    <td>
		       <input type='text' name='<?= $kod ?>' value='<?= $m['jumlah']?>' required>
					 
		    </td>
		</tr>
		 
		<?php  } ?>
		
		<tr>
		    <td></td>
			<td><input type='Submit' value='Simpan'></td>
		</tr>
</table>
</form>
<?php include ('footer.php');?>


	