<?php
# memulakan fungsi session
session_start();

# memanggil fail header,guard-hakim, fungsi,dan connection
include('header.php');
include('guard-juri.php');
include('connection.php');
include('fungsi.php');
?>
<!-- Tajuk laman -->
<h3>Senarai Peserta</h3>

<!-- Borang carian nama peserta -->
<form action='' method='POST'>
    Carian Peserta  <br>
	Nama Peserta    <input type='text'   name='namapeserta'>
	                <input type='Submit' value='Cari'>
</form>

<!-- Header jadual bagi memaparkan senarai peserta -->
<table width='100%' border='1'>
    <tr>
	    <td>ID Peserta</td>
		<td>Nama</td>
		<td>Sekolah</td>
		<td>Markah</td>
		<td>Penilaian</td>
	</tr>
<?php
$tambahan="";
if(!empty($_POST['namapeserta']))
{
	$tambahan="where peserta.namapeserta like '%".$_POST['namapeserta']."%'";
}
# arahan query untuk mencari senarai nama peserta
$arahan_papar="SELECT* FROM peserta
LEFT JOIN sekolah 
ON peserta.idsekolah = sekolah.idsekolah
$tambahan";

# laksanakan arahan mencari data peserta
$laksana = mysqli_query($condb,$arahan_papar);

# Mengambil data yang ditemui
    while($m=mysqli_fetch_array($laksana))
	{
		$data_get=array(
		    'idpeserta'   =>  $m['idpeserta'],
			'namapeserta' =>  $m['namapeserta'],
			'namasekolah' =>  $m['namasekolah']
		);
# memaparkan senarai nama dalam jadual	
        echo"<tr>
		    <td>".$m['idpeserta']."</td>
			<td>".$m['namapeserta']."</td>
			<td>".$m['namasekolah']."</td>
			<td>".$k=markah_individu($m['idpeserta'])."</td>
			
			<td><a href='penilaian-peserta-borang.php?".http_build_query($data_get)."'>Penilaian</a></td>
			</tr>";
	}
?>
</table>
<?php include ('footer.php');?>