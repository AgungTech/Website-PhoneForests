<?php
include('koneksi.php');
$check = mysql_query("SELECT * FROM tb_kegiatan WHERE nama_kegiatan LIKE 'Mengirim SMS' ORDER BY tanggal asc") or die (mysql_error());
if(isset($_POST['isi_sms']))
{
$isi_sms=mysql_real_escape_string($_POST['isi_sms']);
$tanggal_sekarang2=mysql_real_escape_string($_POST['tanggal']);
$jam=mysql_real_escape_string($_POST['jam']);
$user_aktif=mysql_real_escape_string($_POST['user']);
mysql_query("insert into tb_kegiatan values('$tanggal_sekarang2', '$jam', '$user_aktif', 'Mengirim SMS', '$isi_sms')") or die (mysql_error());}
?>
