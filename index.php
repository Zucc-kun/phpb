<?php
# Memulakan fungsi SESSION 
session_start();

# Memanggil fail header.php dan fail fungsi.
include('header.php');
include('fungsi.php');
?>

<!--- Memaparkan pautan (hyperlink) -->
Sila Pilih <br>
| <a href='peserta-signup-borang.php'>Daftar Peserta Baharu</a> |<br>
| <a href='peserta-login-borang.php'>Login Peserta </a> |<br>
| <a href='juri-login-borang.php'>Login Juri</a> |<br>

<!--- Memaparkan Syarat-Syarat Pertandinagn. Ubahsuai syarat pertandingan ini -->
<hr>
<p>Syarat Pertandinagn</p>
<li> Seorang Peserta hanya boleh menghantar 1 penyataan sahaja</li>
<li> Terdapat 2 kategori iaitu sekolah dan individu</li>
<li> Bagi kategori individu, pemenang akan tempat 1 hingga 3</li>
<li> semua penyataan akan mendapat sijil penyataan</li>
<li> Bagi kategori sekolah, tiada had untuk pelajar menghantar penyataan</li>
<li> Pemenang akan dikira dari jumlah mata terkumpul pelajar pelajar dari sekolah tersebut yang menyertai pertandingan</li>
<li> Keputusan hanya akan dipaparkan setelah semua peserta telah dinilai</li>
<hr>
<!--- Memaparkan keputusan individu -->
keputusan individu
<?php
# Memanggil fungsi semak() dari fail fungsi.php
$k=semak();

# Semakan Nilai yang dipulang
if($k=="Semua peserta telah dinilai.")
{
	# jika nilai dipulangkan Semua peserta telah dinilai.
	# panggi fungsi keputusan individu dari fail fungsi.php
	# dan papar keputusan 5 individu terbaik.
	# Bilangan pemenang anda bolah ubah di fail fungsi.php
	keputusan_individu();
}
else
{
	# paparan jika proses penilaian masih belum tamat
	echo "<br>Proses Penilaian masih dibuat";
}

?>



<hr>
<!-- Memaparkan keputusan Keseluruhan Sekolah -->
keputusan Sekolah

<?php>
# Memanggil fungsi semak() dari fail fungsi.php
$k=semak();

if($k=="Semua peserta telah dinilai.")
{
	# jika nilai dipulangkan Semua peserta telah dinilai.
	# panggi fungsi keputusan sekolah dari fail fungsi
	# dan paparkan keputusan keseluruhan sekolah
	keputusan_sekolah();
}
else
{
	# paparan jika proses penilaian masih belum tamat
	echo "<br>Proses Penilaian masih dibuat";
}
?>

<?php include ('footer.php'); ?>








