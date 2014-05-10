<?php 
include "conn.php";
$kd_kelas=$_POST['kd_kelas'];
$tanggal=$_POST['tanggal'];

if(isset($_POST['selesai'])){

	if(!empty($_POST['hadir'])){

		$kd_mhs=$_POST['hadir'];
		$jumlah=count($kd_mhs);
	
		for($i=0;$i<$jumlah;$i++){
			$hadir=mysql_query("insert into absensi(kd_mhs,kd_kelas,keterangan,tanggal,selesai) values('$kd_mhs[$i]','$kd_kelas','h','$tanggal','yes')",$koneksi);
		}
		
		?>
		<script language="javascript">document.location.href="?page=view_absensi&kd_kelas=<?php echo $kd_kelas;?>&tanggal=<?php echo $tanggal;?>";</script>
		<?php 
	}
	
	if(!empty($_POST['sakit'])){

		$kd_mhs=$_POST['sakit'];
		$jumlah=count($kd_mhs);
	
	
		for($i=0;$i<$jumlah;$i++){
			$hadir=mysql_query("insert into absensi(kd_mhs,kd_kelas,keterangan,tanggal,selesai) values('$kd_mhs[$i]','$kd_kelas','s','$tanggal','yes')",$koneksi);
		}
		
		?>
		<script language="javascript">document.location.href="?page=view_absensi&kd_kelas=<?php echo $kd_kelas;?>&tanggal=<?php echo $tanggal;?>";</script>
		<?php 
	}
	
	if(!empty($_POST['ijin'])){

		$kd_mhs=$_POST['ijin'];
		$jumlah=count($kd_mhs);
	
	
		for($i=0;$i<$jumlah;$i++){
			$hadir=mysql_query("insert into absensi(kd_mhs,kd_kelas,keterangan,tanggal,selesai) values('$kd_mhs[$i]','$kd_kelas','i','$tanggal','yes')",$koneksi);
		}
		
		?>
		<script language="javascript">document.location.href="?page=view_absensi&kd_kelas=<?php echo $kd_kelas;?>&tanggal=<?php echo $tanggal;?>";</script>
		<?php 
	}
	
	if(!empty($_POST['alfa'])){
		$kd_mhs=$_POST['alfa'];
		$jumlah=count($kd_mhs);
	
	
		for($i=0;$i<$jumlah;$i++){
			$hadir=mysql_query("insert into absensi(kd_mhs,kd_kelas,keterangan,tanggal,selesai) values('$kd_mhs[$i]','$kd_kelas','a','$tanggal','yes')",$koneksi);
		}
		
		?>
		<script language="javascript">document.location.href="?page=view_absensi&kd_kelas=<?php echo $kd_kelas;?>&tanggal=<?php echo $tanggal;?>";</script>
		<?php 
	}
}else{
	unset($_POST['selesai']);
	?><script language="javascript">document.location.href="?page=input_absensi&kd_kelas=<?php echo $kd_kelas;?>&tanggal=<?php echo $tanggal;?>";</script><?php
}
?>
