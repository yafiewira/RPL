<?php include "conn.php";?>
<div class="post">
	<h2 class="title"><a href="#">REKAP ABSENSI KELAS <?php echo $query['nama_kelas'];?></a></h2>
	
	<div class="entry">
		<p>
		<form action="?page=rekap_absensi" method="post" name="postform">
		<table width="99%" border="0" class="datatable">
		<tr>
			<td width="6%" align="left"> <div align="left">Tanggal</div></td>
		  <td width="24%" align="left"><input type="text" name="tgl1"  value="<?php if(empty($_POST['tgl'])){ echo $tanggal;}else{ echo "$_POST[tgl]$_GET[tgl]"; }?>" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl1);return false;" ><img name="popcal" align="absmiddle" src="calender/calbtn.png" width="34" height="29" border="0" alt=""></a></td>
		  <td width="18%" align="left"><div align="right">s/d Tanggal</div></td>
			<td width="28%" align="left"><input type="text" name="tgl2"  value="<?php if(empty($_POST['tgl'])){ echo $tanggal;}else{ echo "$_POST[tgl]$_GET[tgl]"; }?>" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tgl2);return false;" ><img name="popcal" align="absmiddle" src="calender/calbtn.png" width="34" height="29" border="0" alt=""></a></td>
			
		</tr>
		<tr><td colspan="5" align="left"><select name="kelas">
			<option value="0" selected="selected">Pilih Kelas</option>
			<?php 
			
			$query=mysql_query("select * from kelas order by nama_kelas asc",$koneksi);
			
			while($row=mysql_fetch_array($query))
			{
				?><option value="<?php  echo $row['kd_kelas']; ?>"><?php  echo $row['nama_kelas']; ?></option><?php 
			}
			?>
			</select><input type="submit" value="Tampilkan"></td>
		
		</tr>
		</table>	
		</form>	
		<br /><br />
		<table class="datatable">
		<tr>
			<th>No</th>
			<th>Nama Mahasiswa</th>
			<th>Jumlah Kehadiran</th>
			<th>Jumlah Pertemuan</th>
			
			<th>Presensi</th>
		</tr>
		<?php
	
		$tanggal1=$_POST['tgl1'];
		$tanggal2=$_POST['tgl2'];
		$kelas=$_POST['kelas'];
		
		$query=mysql_query("select distinct kd_mhs from absensi where kd_kelas='$kelas' and tanggal between '$tanggal1' and '$tanggal2' order by tanggal desc",$koneksi);
	
		
		while($row=mysql_fetch_array($query)){
			$mahasiswa=mysql_fetch_array(mysql_query("select * from mahasiswa where kd_mhs='$row[kd_mhs]'",$koneksi));
			$keterangan=$row['keterangan'];
			?>
			<tr>
				<td><?php echo $c=$c+1;?></td>
				<td><?php echo $mahasiswa['nama'];?></td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from absensi where kd_mhs='$row[kd_mhs]' and keterangan='h' and tanggal between '$tanggal1' and '$tanggal2' order by tanggal desc",$koneksi);
					
					$jumlah=mysql_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from absensi where kd_mhs='$row[kd_mhs]' and keterangan='h' and tanggal between '$tanggal1' and '$tanggal2' order by tanggal desc",$koneksi);
					$a=mysql_query("select * from absensi where kd_mhs='$row[kd_mhs]' and keterangan='a' and tanggal between '$tanggal1' and '$tanggal2' order by tanggal desc",$koneksi);
					
					$hadira=mysql_num_rows($a);
					$jumlah=mysql_num_rows($hadir);
					$kehadiran=($jumlah+$hadira);
					
					echo $kehadiran;
					
				?>
				</td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from absensi where kd_mhs='$row[kd_mhs]' and keterangan='h' and tanggal between '$tanggal1' and '$tanggal2' order by tanggal desc",$koneksi);
					$a=mysql_query("select * from absensi where kd_mhs='$row[kd_mhs]' and keterangan='a' and tanggal between '$tanggal1' and '$tanggal2' order by tanggal desc",$koneksi);
					
					$hadira=mysql_num_rows($a);
					$jumlah=mysql_num_rows($hadir);
					$kehadiran=($jumlah+$hadira);
					
					echo ($jumlah/$kehadiran)*100;
					echo "%";
				?>
				</td>
				
			</tr>
			<?php
			
		}
		?>
		</table>
  </div>
</div>

<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
