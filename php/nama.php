<?php
if(@$_SESSION['admin']) {
	$user_level = "Admin : ";
	$user_aktif = @$_SESSION['admin'];
} else if(@$_SESSION['operator']) {
	$user_level = "Operator : ";
	$user_aktif = @$_SESSION['operator'];
} else if(@$_SESSION['user']) {
	$user_level = "Pelanggan : ";
	$user_aktif = @$_SESSION['user'];
}
if(@$_SESSION['admin'] || @$_SESSION['operator'] || @$_SESSION['user']) {
	$sql_user = mysql_query("select * from tb_masuk where kode_user = '$user_aktif'") or die (mysql_error());
	$data_user = mysql_fetch_array($sql_user);
	$level_user_aktif = $user_level;
	$nama_user_aktif = $data_user['username'];
	$nama_user = $user_level.$data_user['nama_lengkap'];
	echo $nama_user;
} else {
	echo "Belum Masuk";
}
?>