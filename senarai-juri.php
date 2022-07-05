<?php
# memulakan fungsi session
session_start(); 

# memanggil fail header, guard_hakim dan connection
include('header.php');
include('guard-juri.php');
include('connection.php');
?>
<h3>Senarai hakim</h3>

<div class="w3-row">
  <div class="w3-half w3-container w3-brown w3-margin-bottom w3-cursive w3-border w3-round-large w3-large w3-card-4">
    
<!-- Navigasi untuk mendaftar hakim baru -->
<a href='juri-daftar-borang.php'>[+] Daftar juri Baru</a>

  </div>
  <div class="w3-half w3-container w3-brown w3-margin-bottom w3-cursive w3-border w3-round-large w3-right-align w3-card-4">
   
<!-- Memanggil fail butang-saiz -->
<?php include('butang-saiz.php'); ?>

  </div>
</div>



<!-- Header bagi jadual untuk memaparkan senarai peserta --> 
<table width='100%' border='1' id='saiz' class='w3-table w3-khaki w3-centered w3-card-4 w3-margin-bottom w3-border'>
    <tr class='w3-sand' >
        <td>Nama</td>
        <td>ID</td>
        <td>katalaluan</td>
    </tr>
<?php
# arahan query untuk mencari senarai hakim
$arahan_papar="Select* from juri";

# laksanakan arahan mencari data hakim 
$laksana = mysqli_query($condb,$arahan_papar);

# Mengambil data yang ditemui
    while($data=mysqli_fetch_array($laksana))
    {
        # memaparkan senarai nama dalam jadual 
        echo"<tr>
        <td>".$data['idjuri']."</td>
		<td>".$data['namajuri']."</td>
        <td>".$data['passjuri']."</td>
        </tr>";

    }
    ?></table>

    <hr>
    <?php include ('footer.php'); ?>