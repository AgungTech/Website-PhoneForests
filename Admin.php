<?php
if (!isset($_REQUEST["hari"])) $_REQUEST["hari"] = date("j");
if (!isset($_REQUEST["bulan"])) $_REQUEST["bulan"] = date("n");
if (!isset($_REQUEST["tahun"])) $_REQUEST["tahun"] = date("Y");

$cHari = $_REQUEST["hari"];
$cBulan = $_REQUEST["bulan"];
$cTahun = $_REQUEST["tahun"];

$pilih_hari = $cHari;
$pilih_bulan = $cBulan;
$pilih_tahun = $cTahun;
?>
    <div id="konten">
		<div id="header">
		</div>
		<div id="menu_atas">
			<ul class="menu_utama">
				  <li class="submenu_atas" tooltip_bawah="Halaman Utama"><a href="/WebPenjualan">Home</a></li>
				  <li><a href="#0">Ponsel</a>
					<ul>
					  <li tooltip_bawah="Lihat Tampilan Ponsel"><a href="?isi=ponsel&mode=lihat_barang">Lihat Barang</a></li>
					  <li tooltip_bawah="Pengelolaan Ponsel"><a href="?isi=ponsel&mode=kelola_barang">Kelola Barang</a></li>
					</ul>
				  </li>
				  <li><a href="#0">Pelanggan</a>
					<ul>
					  <li tooltip_bawah="Pengelolaan Kegiatan"><a href="<?php echo "?isi=pelanggan&mode=lihat_data&hari=".$cHari."&bulan=".$cBulan."&tahun=".$cTahun."&detail=0"; ?>">Lihat Data</a></li>
					  <li tooltip_bawah="Pengelolaan Pengguna"><a href="?isi=pelanggan&mode=kelola_data">Kelola Data</a></li>
					</ul>
				  </li>
				</ul>
			<ul class="menu_masuk">
				  <li tooltip_bawah="Pengguna yang Aktif" class="info_dialog">
				<?php
				include 'php/nama.php';
				?>
				  </li>
				  <li class="info_dialog">Info : 
				<?php
				include 'php/registrasi.php';
				?>
				  </li>
				  <li tooltip_bawah="Tambah User"><a id="registrasi" href="#0">Registrasi</a></li>
				  <li tooltip_bawah="LogOut"><a href="php/keluar.php">Keluar</a></li>
				</ul>
		</div>
        <div id="isi">
			<?php
			include 'php/admin_isi.php';
			?>
