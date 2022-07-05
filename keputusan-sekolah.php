<?php 
# memulakan fungsi session
session_start();

# Memanggil fail header, guard-hakim, connection dan fungsi
include('header.php');
include('guard-juri.php');
include('connection.php');
include ('fungsi.php');
?>
<h3>Senarai Peserta</h3>

<!-- Memanggil fail butang-saiz -->
<?php include('butang-saiz.php'); ?> 

<!-- Header jadual keputusan -->
<table width='100%' border='1' id='saiz'> 
<caption><?= $k=semak(); ?></caption>
    <tr> 
        <td>Kedudukan</td>
        <td>Sekolah</td> 
        <td>Jumlah</td> 
    </tr> 

<?php 
# arahan query untuk mencari jumlah mata terkumpul bg setiap sekolah
$arahan_papar="SELECT 
sekolah.namasekolah,
SUM(keputusan.jumlah) AS jumlah
FROM peserta
JOIN sekolah
ON peserta.idsekolah = sekolah.idsekolah
left JOIN keputusan
ON peserta.idpeserta = keputusan.idpeserta
GROUP BY peserta.idsekolah
order by jumlah DESC 
"; 

# laksanakan arahan mencari  
$laksana = mysqli_query($condb,$arahan_papar); 
$bil=0;
# Mengambil data yang ditemui 
    while($m=mysqli_fetch_array($laksana)) 
    { 
        # memaparkan senarai nama sekolah dalam jadual 
        echo"<tr> 
            <td>".++$bil."</td>
            <td>".$m['namasekolah']."</td> 
            <td>".$m['jumlah']."</td> 
        </tr>"; 
    }
?> 
</table>
<?php include ('footer.php'); ?>