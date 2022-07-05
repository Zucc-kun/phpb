<?php
# 	Memulakan fungsi session 
session_start();

# Memanggil fail header, guard-hakim dan fungsi
include('header.php');
include('guard-juri.php');
include('fungsi.php');

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-peserta
if(empty($_GET))
{
	    die("<script>window.location.href='senarai-peserta.php';</script>");
}

?>

<h3>kemaskini peserta Baru</h3>

<form action='peserta-kemaskini-proses.php?idpeserta_lama=<?= $_GET['idpeserta']?>'
method='POST'>

No ID
<input  type='text'  name='idpeserta' value='<?= $_GET['idpeserta'] ?>' required><br>

Nama
<input  type='text'  name='namapeserta' value='<?= $_GET['namapeserta'] ?>' required><br>

PASSWORD
<input  type='text'  name='passpeserta' value='<?= $_GET['passpeserta'] ?>' required><br>


sekolah
<select name='idsekolah' required>
    <option value='<?= $_GET['idsekolah'] ?>'>
	    <?= $_GET["namasekolah"] ?>
		</option>
		<?= $list=senarai_sekolah(); ?>
</select>  <br>
	
	<input type='submit' value='Kemaskini'>
<?php include ('footer.php'); ?>
