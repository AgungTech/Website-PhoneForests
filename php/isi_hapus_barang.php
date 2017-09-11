<?php
$kodeponsel = @$_GET['kodeponsel'];
$sql2 = mysql_query("select * from tb_ponsel where kode_ponsel = '$kodeponsel'") or die (mysql_error());
$data2 = mysql_fetch_array($sql2);

if($data2['gambar'] == 'Kosong.gif') {
} else {
	unlink("gambar/".$data2['gambar']);
}
if($data2['detail'] == 'Kosong.html') {
} else {
	unlink("detail/".$data2['detail']);
}
mysql_query("delete from tb_ponsel where kode_ponsel = '$kodeponsel'") or die (mysql_error());
?>
<script type="text/javascript">
	window.location.href="?isi=ponsel&mode=kelola_barang#dialog_kelola";
</script>