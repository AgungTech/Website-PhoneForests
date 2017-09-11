<!DOCTYPE html>
<head>
	<!-- Judul Halaman-->
	<title>
	<?php
	@session_start();
	$ket = "";
	include "php/koneksi.php";
	include 'php/masuk.php';
	if(@$_SESSION['admin'] || @$_SESSION['operator']) {
		echo "Pengelolaan Data";
	} else if(@$_SESSION['user']) {
		echo "Phone Forests";
	} else {
		echo "Home";
	}
	?>
	</title>
	<!-- Jenis pengkodean karakter yang digunakan untuk dokumen.-->
	<meta charset="UTF-8">
	<!-- Deskripsi halaman Web-->
	<meta name="description" content="Portal Informasi Harga HP Baru-Second &amp; spesifikasi, Review, Artikel dan informasi terbaru, Jual-Beli HP">
	<!-- Menentukan kata kunci untuk search engines-->
	<meta name="keywords" content="Informasi spesifikasi harga hp,review,artikel,Informasi,jual-beli,Handphone,Spesifikasi,Harga,gadget,HP,jual beli hp,Ponsel android, samsung galaxy,blackberry,nokia,android,iphone,ipad,htc,mito,lg, cross,advan,imo,acer,lenovo,nexian,sony,ericsson,motorola,huawei,informasi harga,Harga HP,Spesifikasi Handphone">
	<!-- Menentukan penulis Website-->
	<meta name="author" content="Novia Erviana">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Ikon Website-->
	<link href="gambar/ikon.ico" rel="icon" type="image/x-icon">
	<!-- Tema CSS Utama Yang Digunakan-->
	<link href="css/<?php if(@$_SESSION["tema"] == "standar") { echo "temaStandar.css"; } else if(@$_SESSION["tema"] == "windows") { echo "temaWindows.css"; } else { echo "temaStandar.css"; }?>" rel="stylesheet" type="text/css">
	<!-- Tema CSS untuk Tabel Sorter-->
	<link rel="stylesheet" type="text/css" href="css/tabelsorter.css">
	<!-- Script untuk menampilkan Kotak Dialog-->
	<script type="text/javascript" src="js/dialogBox.js"></script>
	<!-- Script jquery untuk memberi animasi-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- Script bootstrap untuk membuat tampilan lebih responsif-->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Script untuk mengatur Animasi jquery-->
	<script type="text/javascript" src="js/animasi.js"></script>
	<!-- Script jquery untuk membuat tabel sorter-->
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
	</head>
<body>
    <div id="menu_kiri">
	    <div class="tema">
	    <a href="#dialog_tema" tooltip="Tema">
	    <p align="center">
		<img width="26" height="26" src="gambar/tema.png" />
		</p></a></div>
	    <div class="print">
	    <a href="#dialog_print" tooltip="Cetak">
	    <p align="center">
		<img width="26" height="26" src="gambar/printer.png" />
		</p></a></div>
    </div>
    <div id="menu_kanan">
	    <div class="cari_ponsel" tooltip="Pencarian...">
	    <a href="#dialog_cari">
	    <p align="center">
		<img width="26" height="26" src="gambar/cari.png" />
		</p></a></div>
	    <div class="sms" tooltip="SMS">
	    <a href="#dialog_pesan">
	    <p align="center">
		<img width="26" height="26" src="gambar/SMS.png" />
		</p></a></div>
		<div class="ke_atas" title="Ke Atas">
		<a href="#"> </a>
		</div>
    </div>
	<div id="dialog_masuk">
		<div id="inputan">
			<div id="judul_inputan"><h1>Masuk</h1></div>
			<form action="" method="post">
				<div id="username" style="margin-top:10px;display:none;">
					<input type="text" maxlength="40" name="user" placeholder="Username" class="ketik" required />
				</div>
				<div style="margin-top:10px;display:none;" id="pass">
					<input type="password" maxlength="32" name="pass" placeholder="Password" class="ketik" required />
				</div>
				<div style="margin-top:10px;display:none;" id="tombol_masuk">
					<input type="submit" name="masuk" value="Masuk" class="tombol" /> <a href="#0" id="tutup_m"><button class="tombol">Tutup</button></a>
				</div>
			</form>
		</div>
	</div>
	<div id="dialog_registrasi">
		<div id="inputan">
			<div id="judul_inputan"><h1>Menu Registrasi</h1></div>
			<form action="" method="post">
				<div id="nama" style="margin-top:10px;display:none;">
					<input type="text" maxlength="100" name="nama" placeholder="Nama Lengkap" class="ketik" required />
				</div>
				<div style="margin-top:10px;display:none;" id="user">
					<input type="text" maxlength="40" name="user" placeholder="Username" class="ketik" required />
				</div>
				<div style="margin-top:10px;display:none;" id="gender">
					<select name="gender" class="ketik" required>
						<option value="">.::  Gender ::.</option>
						<option value="laki">Laki-Laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
				</div>
				<div style="margin-top:10px;display:none;" id="alamat">
					<input type="text" maxlength="100" name="alamat" placeholder="Alamat Lengkap" class="ketik" required />
				</div>
				<div style="margin-top:10px;display:none;" id="password">
					<input type="password" maxlength="32" name="pass" placeholder="Password" class="ketik" required />
				</div>
				<div style="margin-top:10px;display:none;" id="tombol_registrasi">
					<input type="submit" name="registrasi" value="Registrasi" class="tombol" /> <a href="#0"><button id="tutup" class="tombol">Tutup</button></a>
				</div>
			</form>
		</div>
	</div>
	<div id="dialog_tema">
		<div class="pilihan">
			<form  action="php/temaStandar.php" method="post" width="200px">
			<button id="tema_standar" name="tombol_standar" class="pilih_tema">
				<h1>Standar</h1>

				<img src="gambar/ikon.ico" width="80px" style="margin-top:10px">
			</button>
			</form>
			<form  action="php/temaWindows.php" method="post" width="200px">
			<button id="tema_windows" name="tombol_windows" class="pilih_tema">
				<h1>Windows 10</h1>

				<img src="gambar/windows.png" width="100px" style="margin-top:10px">
			</button>
			</form>
			<?php echo @$_SESSION['tema'];?>
		</div>
	</div>
	<div id="dialog_print">
	</div>
	<?php
	if(@$_SESSION['admin'] || @$_SESSION['operator']) {
		include "Admin.php";
	} else if(@$_SESSION['user']) {
		include "Home.php";
	} else {
	?>
    <div id="konten">
		<div id="header">
		</div>
		<div id="menu_atas">
			<ul class="menu_utama">
				  <li class="submenu_atas"><a href="?">Home</a></li>
				</ul>
			<ul class="menu_masuk">
				  <li class="info_dialog">
				<?php
				include 'php/nama.php';
				?>
				  </li>
				  <li class="info_dialog">Info : 
				<?php
				echo $ket;
				include 'php/registrasi.php';
				?>
				  </li>
				  <li><a href="#0" id="registrasi">Registrasi</a></li>
				  <li><a href="#0" id="masuk">Masuk</a></li>
				</ul>
		</div>
        <div id="isi">
			<h1>Selamat Datang di Phone Forests</h1>
		<?php
			include 'php/isi_lihat_ponsel.php';
		}
		?>
			<div id="menu_bawah">
			</div>
			<div id="footer">
			<P style="float:left;margin:0em 5em 0 5em;"><a href="http://localhost/WebPenjualan/">Phone Forest</a> © 2015. All Rights Reserved.</p><P style="float:right;margin:0em 5em 0 5em;">Powered By <a href="http://localhost/WebPenjualan/">Novia Erviana</a></p>
			</div>
		</div>
    </div>
	<div id="dialog_pesan">
	<?php
		include "php/program_sms.php";
	?>
	</div>
</body>
</html>
