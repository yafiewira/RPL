<html>
<head>
</head>
<body>
<?php 
ini_set('display_errors',FALSE);
$host="localhost";
$user="root";
$pass="";
$db="rpl";


$koneksi=mysql_connect($host,$user,$pass);
mysql_select_db($db,$koneksi);
$tanggal=date("d/m/Y");

if ($koneksi)
{
}else{
	?><script language="javascript">alert("Gagal Koneksi Database MySql !!")</script><?php 
}

?>

</body>
</html>
