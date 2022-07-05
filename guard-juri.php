<?php
#menyemak nilai pembolehubah session['tahap']
if($_SESSION['tahap'] != "juri")
{
	# jika nilainya tidak sama dengan juri. aturcara akan dihentikan
    die("<script>alert('sila login'); window.location.href='logout.php';</script>");
}
?>