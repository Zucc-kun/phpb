<?php
# Memulakan fungsi session session_start();
session_start();

#memanggil fail header.php fungsi.php
include('header.php');
?>

<!-- Tajuk antaramuka log masuk juri --> 
<h3>Login juri</h3>

<!-- Borang daftar masuk juri -->
<form action='juri-login-proses.php' method='POST'>

    ID Juri     <input type='text'      name='idjuri'         required><br>
	PASSWORD    <input type='password'   name='passjuri'       required><br>
                <input type='submit'     value='Login'>

</form>

<?php include ('footer.php'); ?>