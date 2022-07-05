<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right " style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large ">Close &times;</button>
  
  
  <?php
# Menu juri
if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "juri")
{

echo "
<a class='w3-bar-item w3-button w3-green'href='juri-menu.php'>Menu juri</a>
<a class='w3-bar-item w3-button w3-green'href='senarai-peserta.php'>Senarai Peserta</a>
<a class='w3-bar-item w3-button w3-green' href='peserta-upload-borang.php'>Upload Data Peserta </a>
<a class='w3-bar-item w3-button w3-green' href='senarai-juri.php'>Senarai Juri</a>
<a class='w3-bar-item w3-button w3-green' href='penilaian-peserta.php'>Penilaian Peserta</a>
<a class='w3-bar-item w3-button w3-green' href='keputusan-individu.php'>Keputusan Invividu</a> 
<a class='w3-bar-item w3-button w3-green' href='keputusan-sekolah.php'>Keputusan Sekolah</a>
<a class='w3-bar-item w3-button w3-green' href='logout.php'>Logout</a> 
<hr>";
}

# Menu Peserta
else if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "peserta") 
{
echo "
 <a class='w3-bar-item w3-button w3-green' href='peserta-menu.php'>Menu Peserta</a>
 <a class='w3-bar-item w3-button w3-green' href='logout.php'>Logout</a>
 <hr>";

} else {

   #menu Laman Utama

echo
"
<a class='w3-bar-item w3-button w3-green' href='index.php'>Laman Utama</a><hr><br>";
}

?>


</div>

<!-- Page Content -->
<div class="w3-container w3-indigo">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <h1>PERTANDINGAN </h1>
  </div>
</div>


<div class="w3-container ">

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


?>
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html> 
