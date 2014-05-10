<?php include "cek_session.php"; ?>
<div class="post">
	<h2 class="title"><a href="#">Halaman Mahasiswa</a></h2>
	<p class="meta"><em></p>
	<div class="entry">
		<p>
		
		<h1><b>Tambah Mahasiwa</b></h1>
		
		<form name="siswa" action="?page=mahasiswa" method="post">
		<table>
		<tr>
			<td>Nama</td><td><input type="text" size="20" name="nama" /></td>
		</tr>
		<tr>
			<td>Nim</td><td><input type="text" size="20" name="nim" /></td>
		</tr>
		<tr>
			<td>Password</td><td><input type="text" size="20" name="password" /></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>
			<select name="kelas">
			<option value="0" selected="selected">Pilih Kelas</option>
			<?php 
			include "conn.php";
			
			$query=mysql_query("select * from kelas order by nama_kelas asc",$koneksi);
			
			while($row=mysql_fetch_array($query))
			{
				?><option value="<?php  echo $row['kd_kelas']; ?>"><?php  echo $row['nama_kelas']; ?></option><?php 
			}
			?>
			</select>	
			</td>
		</tr>
		<tr>
			<td></td><td><input type="submit" value="Simpan" /></td>
		</tr>
		</table>
		</form>
		
		<?php 
	
		if(isset($_POST['nama'])){
			$nama=ucwords($_POST['nama']);
			$nim=$_POST['nim'];
			$password=$_POST['password'];
			$kd_kelas=$_POST['kelas'];
			
			$query=mysql_query("insert into mahasiswa values('','$nim','$nama','$password','$kd_kelas')",$koneksi);
			
			if($query){
				echo "<br>";
				echo "<script>Berhasil</script>";
			}else{
				echo "<script>gagal</script>";
				echo mysql_error();
			} 
		}else{
			unset($_POST['nama']);
		}
		
		
		$view=mysql_query("select * from mahasiswa ");
		?>
		<br />
		<table class="datatable">
		<tr><th>No</th><th>Nim</th><th>Nama</th><th>Kelas</th></tr>
		<?php
		while($row=mysql_fetch_array($view)){
		$kls=mysql_fetch_array(mysql_query("SELECT nama_kelas FROM kelas WHERE kd_kelas='$row[kd_kelas]'"));	
		?>
		<tr><td><?php echo $c=$c+1;?></td><td><?php echo $row['nim'];?></td><td><?php echo $row['nama'];?></td>
		<td><?php  echo $kls['nama_kelas']; ?></td></tr>
		<?php
		}
		?>
		</table>
		
		</p>
	</div>
</div>

<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
