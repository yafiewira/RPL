<?php include "cek_session.php"; ?>
<div class="post">
	<h2 class="title"><a href="#">Halaman Absensi</a></h2>

	<div class="entry">
		<p>
		<table class="datatable">
		<tr>
			<th>No</th><th>Nama Kelas</th><th>Jumlah Siswa</th><th>Aksi</th>
		</tr>
		<?php 
		include "conn.php";
		$kelas=mysql_query("select * from kelas order by nama_kelas asc",$koneksi);
		
		
		echo "Total Kelas : ".$jumlah_kelas=mysql_num_rows($kelas);
		echo "<br>Total Siswa : ".$jumlah_siswa=mysql_num_rows(mysql_query("select * from mahasiswa",$koneksi));
		echo "<br><br>";
		
		while($row=mysql_fetch_array($kelas)){
		
			$siswa=mysql_query("select * from mahasiswa where kd_kelas='$row[kd_kelas]'",$koneksi);
			$jumlah=mysql_num_rows($siswa);
			?>
			<tr>
				<td align="center"><?php echo $c=$c+1; ?></td><td align="center"><?php echo $row['nama_kelas']; ?></td><td align="center"><?php echo $jumlah;?> Orang</td>
				<td align="center"><a href="?page=input_absensi&kd_kelas=<?php echo $row['kd_kelas'];?>">Absensi</a></td>
			</tr>
			<?php
		}
		?>
		</table>
		</p>
  </div>
</div>

