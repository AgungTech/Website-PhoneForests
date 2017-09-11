<h1>Kelola Pelanggan</h1>
<div class="pencarian">
<form action="" method="post" width="400px">
	<input type="text" name="teks_cari" placeholder="Masukkan Username / Nama / Alamat / Gender..." class="ketik" />
	<input type="submit" onClick="#" name="cari_user" value="Cari" class="tombol_cari" />
</form>
</div>
<font color="#045">
		<?php
		?>
<fieldset>
	<legend align="center"><h2>Kelola User</h2></legend>
	<div>
		<table width="100%">
		<tr>
			<td>
			</td>
			<td align="right" width="390px">
			</td>
		</tr>
		</table>
	</div>
	<hr />
	<table width="85%" id="tb_kelola_barang" class="tb_kelola_barang" align="center">
		<tr class="judul_tabel">
			<th><a href="?isi=pelanggan&mode=kelola_data&urutkan=kodeuser"><button class="judul_tabel">Kode User</button></a></th>
			<th><a href="?isi=pelanggan&mode=kelola_data&urutkan=user"><button class="judul_tabel">Username</button></a></th>
			<th><a href="#"><button class="judul_tabel">Password</button></a></th>
			<th><a href="?isi=pelanggan&mode=kelola_data&urutkan=nama"><button class="judul_tabel">Nama Lengkap</button></a></th>
			<th><a href="?isi=pelanggan&mode=kelola_data&urutkan=alamat"><button class="judul_tabel">Alamat</button></a></th>
			<th><a href="?isi=pelanggan&mode=kelola_data&urutkan=gender"><button class="judul_tabel">Gender</button></a></th>
			<th><a href="?isi=pelanggan&mode=kelola_data"><button class="judul_tabel">Level</button></a></th>
			<th width="120px">Opsi</th>
			</tr>
		<?php
		function decryptFungsi2( $q ) {
			$kunci  = 'NoviaErviana';
			$qDecoded = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $kunci ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $kunci ) ) ), "\0");
			return( $qDecoded );
		}
		$teks_cari = @$_POST['teks_cari'];
		$cari_user = @$_POST['cari_user'];
		$urutkan = @$_GET['urutkan'];
		if($cari_user) {
			if($teks_cari != "") {
				if($urutkan == "kodeuser") {
					$sql2 = mysql_query("select * from tb_masuk where username like '%$teks_cari%' or nama_lengkap like '%$teks_cari%' or alamat like '%$teks_cari%' or gender like '%$teks_cari%' ORDER by kode_user") or die (mysql_error());
				} else if($urutkan == "user") {
					$sql2 = mysql_query("select * from tb_masuk where username like '%$teks_cari%' or nama_lengkap like '%$teks_cari%' or alamat like '%$teks_cari%' or gender like '%$teks_cari%' ORDER by username") or die (mysql_error());
				} else if($urutkan == "nama") {
					$sql2 = mysql_query("select * from tb_masuk where username like '%$teks_cari%' or nama_lengkap like '%$teks_cari%' or alamat like '%$teks_cari%' or gender like '%$teks_cari%' ORDER by nama_lengkap") or die (mysql_error());
				} else if($urutkan == "alamat") {
					$sql2 = mysql_query("select * from tb_masuk where username like '%$teks_cari%' or nama_lengkap like '%$teks_cari%' or alamat like '%$teks_cari%' or gender like '%$teks_cari%' ORDER by alamat") or die (mysql_error());
				} else if($urutkan == "gender") {
					$sql2 = mysql_query("select * from tb_masuk where username like '%$teks_cari%' or nama_lengkap like '%$teks_cari%' or alamat like '%$teks_cari%' or gender like '%$teks_cari%' ORDER by gender") or die (mysql_error());
				} else {
					$sql2 = mysql_query("select * from tb_masuk where username like '%$teks_cari%' or nama_lengkap like '%$teks_cari%' or alamat like '%$teks_cari%' or gender like '%$teks_cari%' ORDER by level") or die (mysql_error());
				}
			} else {
				if($urutkan == "kodeuser") {
					$sql2 = mysql_query("select * from tb_masuk ORDER by kode_user") or die (mysql_error());
				} else if($urutkan == "user") {
					$sql2 = mysql_query("select * from tb_masuk ORDER by username") or die (mysql_error());
				} else if($urutkan == "nama") {
					$sql2 = mysql_query("select * from tb_masuk ORDER by nama_lengkap") or die (mysql_error());
				} else if($urutkan == "alamat") {
					$sql2 = mysql_query("select * from tb_masuk ORDER by alamat") or die (mysql_error());
				} else if($urutkan == "gender") {
					$sql2 = mysql_query("select * from tb_masuk ORDER by gender") or die (mysql_error());
				} else {
					$sql2 = mysql_query("select * from tb_masuk ORDER by level") or die (mysql_error());
				}
			}
		} else {
			if($urutkan == "kodeuser") {
				$sql2 = mysql_query("select * from tb_masuk ORDER by kode_user") or die (mysql_error());
				echo "Diurutkan berdasarkan Kode User";
			} else if($urutkan == "user") {
				$sql2 = mysql_query("select * from tb_masuk ORDER by username") or die (mysql_error());
				echo "Diurutkan berdasarkan Username";
			} else if($urutkan == "nama") {
				$sql2 = mysql_query("select * from tb_masuk ORDER by nama_lengkap") or die (mysql_error());
				echo "Diurutkan berdasarkan Nama Lengkap";
			} else if($urutkan == "alamat") {
				$sql2 = mysql_query("select * from tb_masuk ORDER by alamat") or die (mysql_error());
				echo "Diurutkan berdasarkan Alamat";
			} else if($urutkan == "gender") {
				$sql2 = mysql_query("select * from tb_masuk ORDER by gender") or die (mysql_error());
				echo "Diurutkan berdasarkan Gender";
			} else {
				$sql2 = mysql_query("select * from tb_masuk ORDER by level") or die (mysql_error());
				echo "Diurutkan berdasarkan Level";
			}
		}
		
		$cek2 = mysql_num_rows($sql2);
		if($cek2 < 1) {
			?>
			<tr>
				<td colspan="10">Data tidak ditemukan</td>
			</tr>
			<?php
		} else {
			while($data2 = mysql_fetch_array($sql2)) {
			?>
			<tr>
				<td><?php echo $data2['kode_user']; ?></td>
				<td><?php echo $data2['username']; ?></td>
				<td>
				<?php
				$pass_kiri2 = $data2['username'];
				$pass_encrypt2 = $data2['password'];
				if(@$_SESSION['admin']) {
					echo $pass_decrypt2 = decryptFungsi2(substr($pass_encrypt2, strlen($pass_kiri2),strlen($pass_encrypt2)));
				} else if(@$_SESSION['operator']) {
					if($data2['level'] == 'admin') {
						echo "disembunyikan";
					} else if($data2['level'] == 'operator') {
						if($data2['kode_user'] == $user_aktif) {
							echo $pass_decrypt2 = decryptFungsi2(substr($pass_encrypt2, strlen($pass_kiri2),strlen($pass_encrypt2)));
						} else {
							echo "disembunyikan";
						}
					} else if($data2['level'] == 'user') {
						echo $pass_decrypt2 = decryptFungsi2(substr($pass_encrypt2, strlen($pass_kiri2),strlen($pass_encrypt2)));
					}
				} else if(@$_SESSION['user']) {
					if($data2['level'] == 'admin' || $data2['level'] == 'operator') {
						echo "disembunyikan";
					} else if($data2['level'] == 'user') {
						if($data2['kode_user'] == $user_aktif) {
							echo $pass_decrypt2 = decryptFungsi2(substr($pass_encrypt2, strlen($pass_kiri2),strlen($pass_encrypt2)));
						} else {
							echo 'disembunyikan';
						}
					}
				} else {
					echo "Di sembunyikan";
				}
				?>
				</td>
				<td><?php echo $data2['nama_lengkap']; ?></td>
				<td><?php echo $data2['alamat']; ?></td>
				<td><?php
				if ($data2['gender'] == 'laki') {
					?>Laki-laki<?php
				} else if ($data2['gender'] == 'perempuan') {
					?>Perempuan<?php
				}
				?></td>
				<td><?php echo $data2['level']; ?></td>
				<td>
					<?php
					if(@$_SESSION['admin']) {
						if($data2['level'] == 'admin') {
							?>
						<p class="kolom"><a href="?isi=pelanggan&mode=ubah_user&kodeuser=<?php echo $data2['kode_user']; ?>"><button onclick="dialogUbah()" class="tombol">Ubah</button></a>
							<?php
						} else {
							?>
						<p class="kolom"><a href="?isi=pelanggan&mode=ubah_user&kodeuser=<?php echo $data2['kode_user']; ?>"><button onclick="dialogUbah()" class="tombol">Ubah</button></a>
						<a onClick="return confirm('Yakin ingin menghapus data ?')"href="?isi=pelanggan&mode=hapus_user&kodeuser=<?php echo $data2['kode_user']; ?>"><button class="tombol">Hapus</button></a></p>
							<?php
						}
					} else if(@$_SESSION['operator']) {
						if($data2['level'] == 'admin') {
							echo "tidak ada";
						} else if($data2['level'] == 'operator') {
							if($data2['kode_user'] == $user_aktif) {
								?>
						<p class="kolom"><a href="?isi=pelanggan&mode=ubah_user&kodeuser=<?php echo $data2['kode_user']; ?>"><button onclick="dialogUbah()" class="tombol">Ubah</button></a>
								<?php
							} else {
								echo "tidak ada";
							}
						} else {
							?>
						<p class="kolom"><a href="?isi=pelanggan&mode=ubah_user&kodeuser=<?php echo $data2['kode_user']; ?>"><button onclick="dialogUbah()" class="tombol">Ubah</button></a>
						<a onClick="return confirm('Yakin ingin menghapus data ?')"href="?isi=pelanggan&mode=hapus_user&kodeuser=<?php echo $data2['kode_user']; ?>"><button class="tombol">Hapus</button></a></p>
							<?php
						}
					} else {
						echo "tidak ada";
					}
					?>
				</td>
			</tr>
		<?php
			}
		}
		?>
	</table>
</fieldset>