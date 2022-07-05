<?php
# Memulakan fungsi session session_start();
session_start();

#memanggil fail header.php fungsi.php
include('header.php');
?>

<!-- Tajuk antaramuka log masuk peserta --> 
<h3>Login Peserta</h3>

<!-- Borang Pendaftaran Peserta baru -->
<form action='peserta-login-proses.php' method='POST'>

    ID Peserta      <input type='text'      name='idpeserta'         required><br>
	PASSWORD        <input type='password'      name='passpeserta'       required><br>
                    <input type='submit'    value='Login'>

</form>

<?php include ('footer.php'); ?>