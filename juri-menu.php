<?php
# memulakan fail session 
session_start();

# memanggil fail header.php dan guard-hakim.php
include('header.php');
include('guard-juri.php');
?>

<!--memaparkan nama hakim -->
<p>Selamat Datang <?= $_SESSION['namajuri'] ?></p>

<!-- memaparkan tugas tugas juri pertandingan -->
<p>Tugas Juri</p>
<ol>
    <li>Setiap juri boleh mendaftarkan peserta baharu dengan memuat naik data *txt peserta.</li>
	<li>Setiap hakim boleh menilai mana-mana peserta yang telah disenaraikan.</li>
	<li>Peserta terakhir akan dinilai dan diberikan markah pada hari terakhir pertandingan.</li>
</ol>

<?php include('footer.php');?>