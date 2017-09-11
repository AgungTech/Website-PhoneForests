<?php
$jam = @$_GET['jam'];
$hari = @$_GET['hari'];
$bulan = @$_GET['bulan'];
$tahun = @$_GET['tahun'];
$teks = @$_GET['teks_cari'];
$hapus = mysql_query("delete from tb_kegiatan where jam = '$jam'") or die (mysql_error());
if($hapus) {
	echo "Kegiatan berhasil dihapus";	
} else {
	echo "Kegiatan gagal dihapus";
}
?>
<br />
<a id="kembali" href="?isi=pelanggan&mode=lihat_data&hari=<?php echo $hari.'&bulan='.$bulan.'&tahun='.$tahun.'&teks_cari2='.$teks.'#kalender'; ?>" class="tombol">OK</a>
<script type="text/javascript">
	document.getElementById("kembali").click();
</script>