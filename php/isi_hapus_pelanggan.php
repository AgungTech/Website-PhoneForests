<?php
$kodeuser = @$_GET['kodeuser'];
mysql_query("delete from tb_masuk where kode_user = '$kodeuser'") or die (mysql_error());
?>
<script type="text/javascript">
	window.location.href="?isi=pelanggan&mode=kelola_data";
</script>