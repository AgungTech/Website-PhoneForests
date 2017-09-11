<?php
$isi = @$_GET['isi'];
$mode = @$_GET['mode'];
if($isi == "ponsel") {
	if($mode == "lihat_barang") {
		include 'php/isi_lihat_ponsel.php';
	} else if($mode == "kelola_barang") {
		include 'php/isi_kelola_ponsel.php';
	} else if($mode == "ubah_barang") {
		include 'php/isi_ubah_barang.php';
	} else if($mode == "hapus_barang") {
		include 'php/isi_hapus_barang.php';
	}
} else if($isi == "pelanggan") {
	if($mode == "lihat_data") {
		include 'php/isi_lihat_pelanggan.php';
	} else if($mode == "kelola_data") {
		include 'php/isi_kelola_pelanggan.php';
	} else if($mode == "ubah_user") {
		include 'php/isi_ubah_pelanggan.php';
	} else if($mode == "hapus_user") {
		include 'php/isi_hapus_pelanggan.php';
	} else if($mode == "hapus_kegiatan") {
		include 'php/isi_hapus_kegiatan.php';
	}
} else if($isi == "") {
	include 'php/isi_home.php';
}else {
	include 'php/isi_error.php';
}
?>