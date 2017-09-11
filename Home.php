<?php

?>
    <div id="konten">
		<div id="header">
		</div>
		<div id="menu_atas">
			<ul class="menu_utama">
				  <li class="submenu_atas"><a href="#0">Home</a></li>
				  <li><a href="?pesanan=1">Pesanan</a></li>
				</ul>
			<ul class="menu_masuk">
				  <li class="info_dialog">
				<?php
				include 'php/nama.php';
				?>
				  </li>
				  <li class="info_dialog">Info :  
				<?php
				include 'php/registrasi.php';
				?>
				  </li>
				  <li><a href="#0" id="registrasi">Registrasi</a></li>
				  <li><a href="php/keluar.php">Keluar</a></li>
				</ul>
		</div>
        <div id="isi">
			<h1>Cari "Mobile Gadget" Anda Disini</h1>
			<?php
			include 'php/isi_lihat_ponsel.php';
			?>
