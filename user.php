<?php include "cek_session.php"; ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" /></head>
<body >
<div id="bodybg">
	<div id="logo" >
		<h1><a href="#">Tubes Pratikum RPL</a></h1>
	</div>
	

	<div id="header">
		<div id="menu">
			<ul>
				<li><a href="logout.php" onclick="return confirm('Apakah Anda yakin?')">Logout</a></li>
			</ul>
		</div>
		
	</div>
	
	<div id="page" >
		
		<?php include "rekap_absensi.php";?>
		
	
		<div style="clear: both;">&nbsp;</div>
	</div>
	

</div>
</body>
</html>
