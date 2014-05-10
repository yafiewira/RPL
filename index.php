<?php   session_start();
if (isset($_POST['userid']))
{
	include ("conn.php");
	$user_name=htmlentities((trim($_POST['userid'])));
	$password=htmlentities(($_POST['passwd']));
	$dosen=mysql_query("select * from dosen where nip='$user_name' and password='$password'",$koneksi);
	$admin=mysql_query("select * from admin where user='$user_name' and password='$password'",$koneksi);
	$login=mysql_query("select * from mahasiswa where nim='$user_name' and password='$password'",$koneksi);
	$cek_loginadmin=mysql_num_rows($admin);
	$cek_logindosen=mysql_num_rows($dosen);
	$cek_login=mysql_num_rows($login);
		if (empty($cek_login) and empty($cek_loginadmin) and empty($cek_logindosen))
		{
			?><script language="javascript">
			alert("Maaf, Password Anda salah!!");
			document.location="index.php";
			</script><?php  
		}
		else
		{
			
			if ($row=mysql_fetch_array($admin))
			{
				$id=$row[0];
				session_register('id');
				session_register('user_name');
				echo "<script> document.location.href='admin.php'; </script>";
			}else if($row=mysql_fetch_array($login)){
				$id=$row[0];
				session_register('id');
				session_register('user_name');
				echo "<script> document.location.href='user.php'; </script>";
			
			}else if($row=mysql_fetch_array($dosen)){
				$id=$row[0];
				session_register('id');
				session_register('user_name');
				echo "<script> document.location.href='dosen.php'; </script>";
			
			}else{
				echo "<script> Coba lagi !!!</script>";
			}
			
		}
}else{
	unset($_POST['userid']);
}
?>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<title>Login</title>
<body onLoad=document.postform.elements['userid'].focus(); >

<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="19%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
<tr> 
	<td width="4%" align="right"><img src="./images/Pattern-5.png"></td>
	<td width="100%" bgcolor="black" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Form Login</font></strong></div></td>
	<td width="21%"><img src="./images/Pattern-5.png"></td>
</tr>
<tr>
	<td background="./images/Pattern-5.png">&nbsp;</td>
	<td>
	<table width="259" align="center">
		<tr><td width="251"><font face="verdana" size="2">&nbsp;
		</font>
		
		<form action="index.php" method="post" name="postform" id="postform">
		  <table width="251" height="101" border="0" align="center">
		  <tr valign="bottom">
			<td width="104" height="35"><font size="4" face="verdana">Username</font></td>
			  <td width="137"><font size="4" face="verdana">
				<input type="text" name="userid" size="20" id="userid">
			  </font></td>
		  </tr>
		  
		  <tr valign="top">
			<td height="34"><font size="4" face="verdana">Password</font></td>
			  <td><font size="4" face="verdana">
				<input type="password" name="passwd" size="20" id="passwd">
			  </font></td>
		  </tr>
		  
		  <tr>
		  	<td>&nbsp;</td>
		  	<td><font size="4" face="verdana">
				<input type="submit" value="LOGIN" onClick="return cek()">
			  </font></td>
			  
		  </tr>
		  </table>
		</form>
		
				
		</td></tr>
	</table>
	</td>
	<td background="./images/Pattern-5.png">&nbsp;</td>
	<td width="1%"></td>
</tr>
<tr> 
	<td align="right"><img src="./images/Pattern-5.png"></td>
	<td bgcolor="black" ><div align="center"><strong><font face="verdana" size="3"></font></strong></div></td>
	<td><img src="./images/Pattern-5.png"></td>
</tr>
</table>
</body>
</html>
