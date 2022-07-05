<?php 
# memulakan fungsi session
session_start();

# memanggil fail header, guar-peserta, connection dan fungsi
include('header.php');
include('guard-peserta.php');
include ('connection.php');
include('fungsi.php');

# pemboleh ubah $k mengambil nilai yang dipulangkan oleh fungsi semak
$k=semak();

# jika nilai yang dipulangkan oleh fungsi semak seperti dibawah
if($k=="Semua peserta telah dinilai.")
{
    # arahan untuk mencari dan menyusun peserta yang mempunyai mata tertinggi
    $query_semak    =   "
    SELECT 
    peserta.namapeserta, 
    peserta.idpeserta,
    sekolah.namasekolah,
    SUM(keputusan.jumlah) AS jumlah
    FROM peserta
    JOIN sekolah
    ON peserta.idsekolah = sekolah.idsekolah
    left JOIN keputusan
    ON peserta.idpeserta = keputusan.idpeserta
    GROUP BY keputusan.idpeserta
    order by jumlah DESC ";

    # laksanakan proses pencarian
    $laksana        =   mysqli_query($condb,$query_semak);
    $bil=1;

    # mengambil data hasil proses pencarian di atas
    while($m=mysqli_fetch_array($laksana))
    {
        # jika data yang ditemu sepadan dengan nokp peserta yang sedang log masuk
        if($m['idpeserta']==$_SESSION['idpeserta'])
        {
            # paparkan kedudukan keputusan peserta tersebut
            echo "Anda mendapat tempat ke : ".$bil."<br>";
        }
        $bil++;
    }
}
echo $k;
?>
<?php include ('footer.php'); ?>