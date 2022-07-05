<?php 
# memulakan fungsi session
session_start();

#memanggil fail header, guard-hakim, connection dan fungsi
include('header.php');
include('guard-juri.php');
include('connection.php');
include ('fungsi.php');
?>
<h3>Senarai Peserta</h3>
<!-- Bahagian 1 : memaparkan borang untuk memilih sekolah -->
<form action='' method='POST'>
    <select name='idsekolah'>
        <option selected value disabled>Carian Mengikut Sekolah</option>
        <!-- Memaparkan senarai sekolah dalam bentuk drop down list -->
        <?= $list=senarai_sekolah(); ?>

    </select> <input type='submit' value='Papar'>

</form>

<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan -->
<?php include('butang-saiz.php'); ?>

<!-- Header bagi jadual untuk memaparkan senarai peserta -->
<table width='100%' border='1' id='saiz'> 
    <tr> 
        <td>Nama Peserta</td> 
        <td>ID Peserta</td> 
        <td>Sekolah</td> 
        <td>Katalaluan</td> 
        <td>Tindakan</td>
    </tr> 

<?php 

# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai peserta
$tambahan="";
if(!empty($_POST['idsekolah']))
{
    $tambahan= "and peserta.idsekolah = '".$_POST['idsekolah']."'";
}

# arahan query untuk mencari senarai nama peserta 
$arahan_papar="select* from peserta, sekolah 
where peserta.idsekolah = sekolah.idsekolah 
$tambahan "; 

# laksanakan arahan mencari data peserta 
$laksana = mysqli_query($condb,$arahan_papar); 

# Mengambil data yang ditemui 
    while($m=mysqli_fetch_array($laksana)) 
    { 
        # umpukkan data kepada tatasusunan bagi tujuan kemaskini peserta
        $data_get=array(
            'idpeserta'          =>  $m['idpeserta'],
            'namapeserta'          =>  $m['namapeserta'],
            'passpeserta'    =>  $m['passpeserta'],
            'idsekolah'   =>  $m['idsekolah'],
            'namasekolah'  =>  $m['namasekolah'],
        );

        # memaparkan senarai nama dalam jadual 
        echo"<tr> 
        <td>".$m['idpeserta']."</td> 
        <td>".$m['namapeserta']."</td> 
        <td>".$m['namasekolah']."</td> 
        <td>".$m['passpeserta']."</td> ";
        
        # memaparkan navigasi untuk kemaskini dan hapus data peserta
        echo"<td>

        |<a href='peserta-kemaskini-borang.php?".http_build_query($data_get)."'>
         Kemaskini</a>

|<a href='peserta-padam-proses.php?idpeserta=".$m['idpeserta']."' 
onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
Hapus</a>|

        </td>
        </tr>"; 
    }

?> 
</table>
<?php include ('footer.php'); ?>