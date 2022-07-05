<?php
#nama host
$nama_host = "localhost";

#username bagi SQL  
$nama_sql = "root";

#password bagi SQL 
$pass_sql = "admin123";

#nama pengkalan data yang anda telah bangunkan sebelum ini 
$nama_db = "esppk";

#membuka hubungan antara pengkalan data dan sistem
$condb = mysqli_connect($nama_host,$nama_sql,$pass_sql,$nama_db);

#menguji adakah hubungan berjaya dibuka
if (!$condb) 
{
	die("Sambungan ke pengkalan data gagal");
}
else
{
	#echo "Sambungan ke pengkalan data berjaya";
}
?>