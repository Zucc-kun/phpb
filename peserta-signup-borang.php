<?php
# Memulakan fungsi session session_start();
session_start();

#memanggil fail header.php fungsi.php
include('header.php');
include('fungsi.php');
?>
<!-- Tajuk antaramuka --> 
<h3>Pendaftaran Peserta Baru</h3>

<!-- Borang Pendaftaran Peserta baru -->
<form action='peserta-signup-proses.php' method='POST'>

    ID Peserta      <input type='text'      name='idpeserta'     required><br>
    Nama Peserta    <input type='text'      name='namapeserta'   required><br>
	Sekolah         <select                 name='idsekolah'     required><br>

                    <option selected value disabled>Pilih</option>
                    <!-- Mengambil senarai sekolah dari fail fungsi.php --> 
					<?= $list=senarai_sekolah(); ?>

                    </select><br>

	PASSWORD        <input type='password'  name='passpeserta'       required><br>

                    <input type='submit' value='Daftar'>

</form>

<?php include ('footer.php'); ?>