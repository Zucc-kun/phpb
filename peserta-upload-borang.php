<?php
# memulakan fungsi session
session_start();

# memanggil fail header, guard-juri dan connection
include('header.php');
include('guard-juri.php');
include('connection.php');
?>

<!--Tajuk Laman-->
<h3>Muat Naik Data Peserta (*.txt)</h3>

<!--Borang untuk memuat naik fail-->
<form action='peserta-upload-proses.php' method='POST' enctype='multipart/form-data'>

     <h3><b>Sila Pilih Fail txt yang ingin diupload</b></h3>
	 <input      type='file'        name='data-peserta'>
	 <button     type='submit'      name='btn-upload'>Muat Naik</button>
	 
</form>
<?php include ('footer.php'); ?>