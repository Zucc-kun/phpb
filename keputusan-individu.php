<?php
#memulakan fungsi session 
session_start();

# memanggil fail header, guard-juri dan connection
include('header.php');
include('guard-juri.php');
include('connection.php');
include('fungsi.php');
?>

<h3>Keputusan Individu</h3>
<!-- memanggil fail burang-saiz.-->
<?php include('butang-saiz.php'); ?>
<!-- Header jadual keputusan-->
<table width='100%' border='1' id='saiz'>
    <caption><?= $s=semak(); ?></caption>
	<tr>
	    <td>Kedudukan</td>
		<td>Nama</td>
        <td>ID Peserta</td>
		<td>sekolah</td>
		<td>jumlah</td>
	</tr>
	
<?php
#arahan query untuk mencari senarai pemenang 
$arahan_papar="SELECT
peserta.namapeserta,
peserta.idpeserta,
sekolah.namasekolah,
SUM(keputusan.jumlah) AS jumlah
FROM peserta
JOIN sekolah
ON peserta.idsekolah  = sekolah.idsekolah
left JOIN keputusan
ON peserta.idpeserta = keputusan.idpeserta
GROUP BY keputusan.idpeserta
order by jumlah DESC ";

# laksanakan arahan mencari data peserta
$laksana = mysqli_query($condb,$arahan_papar);
$bil=0;
# Mengambil data yang ditemui
    while($m=mysqli_fetch_array($laksana))
	{
	    # memaparkan senarai nama dalam jadual
		echo"<tr>
		         <td>".++$bil."</td>
				 <td>".$m['namapeserta']."</td>
				 <td>".$m['idpeserta']."</td>
				 <td>".$m['namasekolah']."</td>
				 <td>".$m['jumlah']."</td>
			 </tr>";
	}
?>
</table>
<?php include ('footer.php'); ?>