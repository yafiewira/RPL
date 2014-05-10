<?php include "cek_session.php"; ?>
<div class="post">
	<h2 class="title"><a href="#">Halaman Kelas</a></h2>
	
	<div class="entry">
		<p>
			<h1><b> Tambah Kelas </a></h1>
		<form action="?page=kelas" method="post">
		<table>
		<tr>
			<td>Nama Kelas</td><td><input type="text" size="20" name="nama_kelas" /></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" value="Tambah" /></td>
		</tr>
		</table>
		</form>
		
		<?php 
		include "conn.php";
		
		
		if(isset($_POST['nama_kelas'])){
			$nama_kelas=strtoupper($_POST['nama_kelas']);
			
			$query=mysql_query("insert into kelas(nama_kelas) values('$nama_kelas')",$koneksi);
			
			if($query){
				echo "<br>";
				echo "Berhasil";
			}else{
				echo "gagal";
				echo mysql_error();
			} 
		}else{
			unset($_POST['nama_kelas']);
		}
		
	
		$view=mysql_query("select * from kelas order by nama_kelas asc");
		?>
		<br />
		<table class="datatable">
		<tr><th>Nama Kelas</th></tr>
		<?php
		while($row=mysql_fetch_array($view)){
		?>
		<tr><td><?php echo $row['nama_kelas'];?></td></tr>
		<?php
		}
		?>
		</table>
				
		</p>
  	</div>
</div>


