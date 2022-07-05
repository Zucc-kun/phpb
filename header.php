
<style>
h1, h2, h3, h4, h5, h6  {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ;
}
</style>
<style>
body  {
  font-family: Arial, Helvetica, sans-serif ;
}
</style>

<!--tajuk sistem. Akan dipaparkan disebelah atas --> 
<h1>PERTANDINGAN MELUKIS POSTER KEMERDEKAAN</h1>
<p>Anjuran PPD Sepang</p>
<hr>


<!-- Bahagian Menu Asas. 

Menu terbahagi kepada 3 jenis iaitu 
1. Menu hakim dimana hakim dapat akses semua perkara
2. Menu peserta dimana peserta hanya boleh memeriksa keputusan pertandingan. peserta perlu login.
3. Menu di laman utama bagi pelawat yang tidak login -

Anda boleh menambah menu mengikut kehendak anda
-->

<?php
# Menu juri
if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "juri")
{

echo "
 |<a href='juri-menu.php'>Menu juri</a>
 |<a href='senarai-peserta.php'>Senarai Peserta</a>
 |<a href='peserta-upload-borang.php'>Upload Data Peserta </a>
 |<a href='senarai-juri.php'>Senarai Juri</a>
 |<a href='penilaian-peserta.php'>Penilaian Peserta</a>
 |<a href='keputusan-individu.php'>Keputusan Invividu</a> 
 |<a href='keputusan-sekolah.php'>Keputusan Sekolah</a>
 |<a href='logout.php'>Logout</a> 
 |<hr>";
}

# Menu Peserta
else if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "peserta") 
{
echo "
| <a href='peserta-menu.php'>Menu Peserta</a>
| <a href='logout.php'>Logout</a>
| <hr>";

} else {

   #menu Laman Utama

echo
"
<a href='index.php'>Laman Utama</a><hr><br>";
}

?>

