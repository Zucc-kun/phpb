<?php
# memulakan fungsi session
session_start();

# menyemak kewujudan data post yang dihantar dari peserta-login-borang.php
if(!empty($_POST['idpeserta'] and !empty($_POST['passpeserta'])))
{
    # jika data yang dihantar tidak empty

    # memanggil fail connection.php
    include ('connection.php');

    # Arahan(query) untuk membandingkan data yang dimasukkan
    $query_login = "select * from peserta
    where 
            idpeserta            =   '".$_POST['idpeserta']."'
    and     passpeserta          =   '".$_POST['passpeserta']."' ";

    # melaksakan arahan membandingkan data
    $laksana_query = mysqli_query($condb,$query_login);

    # jika terdapat 1 data yang sepadan, login berjaya
    if(mysqli_num_rows($laksana_query)==1)
    {
        # mengambil data yang ditemui
        $m  =   mysqli_fetch_array($laksana_query);

        # mengumpukkan kepada pembolehubah session
		$_SESSION['idpeserta']   =   $m['idpeserta'];
        $_SESSION['namapeserta']   =   $m['namapeserta'];
        $_SESSION['tahap']  =   "peserta";

        # membukan laman peserta-menu.php
        echo "<script>window.location.href='peserta-menu.php';</script>";
    }
    else
    {
        # login gagal. kembali ke laman peserta-login-borang.php
        die("<script>alert('login Gagal');
        window.location.href='peserta-login-borang.php';</script>");
    }
}
else
{
    # data yang dihantar dari laman peserta-login-borang.php kosong
    die("<script>alert('sila masukkan nokp dan password');
    window.location.href='peserta-login-borang.php';</script>");
}

?>