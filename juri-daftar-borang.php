<?php
#memulakan fungsi session
session_start();

#memanggil fail header dan guard-juri
include('header.php');
include('guard-juri.php');
?>
<!--tajuk antaramuka -->
<h3>Pendaftaran Juri Baharu</h3>

<!--borang pendaftaran juri baru -->
<form action='juri-daftar-proses.php' method='POST'>
    Nama        <input  type='text'  name='namajuri'><br>
	ID Juri   <input  type='text'  name='idjuri'><br>
	Katalaluan  <input  type='password'  name='passjuri'><br>
	            <input  type='submit'  value='simpan'>
</form>
<?php include ('footer.php'); ?>