<font color="#F00">
<?php
	function encryptFungsi( $q ) {
		$kunci  = 'NoviaErviana';
		$qEncoded = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $kunci ), $q, MCRYPT_MODE_CBC, md5( md5( $kunci ) ) ) );
		return( $qEncoded );
	}
	function decryptFungsi( $q ) {
		$kunci  = 'NoviaErviana';
		$qDecoded = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $kunci ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $kunci ) ) ), "\0");
		return( $qDecoded );
	}
	$kodeuser = @$_GET['kodeuser'];
	$sql_ubah = mysql_query("select * from tb_masuk where kode_user = '$kodeuser'") or die (mysql_error());
	$data_ubah = mysql_fetch_array($sql_ubah);
	$user =  @$_POST['user'];
	$pass_kiri = $data_ubah['username'];
	$pass_encrypt = $data_ubah['password'];
	$pass =  $user.encryptFungsi(@$_POST['pass']);
	$nama =  @$_POST['nama'];
	$gender =  @$_POST['gender'];
	$alamat =  @$_POST['alamat'];
	$level =  @$_POST['level'];
	$ubah_data = @$_POST['ubah_data'];
	$tutup_data = @$_POST['tutup_data'];
		if($tutup_data) {
						?>
						<script type="text/javascript">
						window.location.href="?isi=pelanggan&mode=kelola_data";
						</script>
						<?php
		} else if($ubah_data) {
			if($user == "" || $pass == "" || $nama == "" || $alamat == "") {
				echo "Tidak boleh ada yang kosong";
			} else {
						mysql_query("update tb_masuk set username = '$user', password = '$pass', nama_lengkap = '$nama', alamat = '$alamat', gender = '$gender', level = '$level' where kode_user = '$kodeuser'") or die (mysql_error());
						echo "Data berhasil di Update";
						?>
						<script type="text/javascript">
						alert("Data berhasil di Update");
						window.location.href="?isi=pelanggan&mode=ubah_user&kodeuser=<?php echo $kodeuser; ?>";
						</script>
						<?php
				} 
			}
?>
</font>

<fieldset id="dialog_ubah">
	<legend align="center"><h2>Ubah Data</h2></legend>
	<form action="" method="post" enctype="multipart/form-data">
		<table id="lihat_form">
			<tr align="left">
			<td width="50px">Kode-User</td>
			<td>:</td>
			<td width="100%"><input type="text" maxlength="8" style="color:#999; font-weight: bold;" name="kode_user" value="<?php echo $data_ubah['kode_user']; ?>" class="ketik_teks" readonly /></td>
			</tr>
			<tr align="left">
			<td>Username</td>
			<td>:</td>
			<td><input type="text" maxlength="40" name="user" value="<?php echo $data_ubah['username']; ?>" class="ketik_teks" required /></td>
			</tr>
			<tr align="left">
			<td>Password</td>
			<td>:</td>
			<td><input type="text" maxlength="32" name="pass" value="<?php echo $pass_decrypt = decryptFungsi(substr($pass_encrypt, strlen($pass_kiri),strlen($pass_encrypt))); ?>" class="ketik_teks" required /></td>
			</tr>
			<tr align="left">
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><input type="text" maxlength="100" name="nama" value="<?php echo $data_ubah['nama_lengkap']; ?>" class="ketik_teks" required /></td>
			</tr>
			<tr align="left">
			<td>Alamat</td>
			<td>:</td>
			<td><input type="text" maxlength="100" name="alamat" value="<?php echo $data_ubah['alamat']; ?>" class="ketik_teks" required /></td>
			</tr>
			<tr align="left">
			<td>Gender</td>
			<td>:</td>
			<td>
			<table>
				<tr>
					<?php
					if($data_ubah['gender'] == 'laki') {
						?>
					<th><input type="radio" name="gender" value="laki" required checked>Laki-laki</th>
					<th><input type="radio" name="gender" value="perempuan">Perempuan</th>
						<?php
					} else if($data_ubah['gender'] == 'perempuan') {
						?>
					<th><input type="radio" name="gender" value="laki" required>Laki-laki</th>
					<th><input type="radio" name="gender" value="perempuan" checked>Perempuan</th>
						<?php
					}
					?>
				</tr>
			</table>
			</td>
			</tr>
			<?php
			if(@$_SESSION['admin']) {
			?>
			<tr align="left">
			<td>Level</td>
			<td>:</td>
			<td>
			<table>
				<tr>
					<?php
					if($data_ubah['level'] == 'operator') {
						?>
					<th><input type="radio" name="level" value="operator" required checked>Operator</th>
					<th><input type="radio" name="level" value="user">Pelanggan</th>
						<?php
					} else if($data_ubah['level'] == 'user') {
						?>
					<th><input type="radio" name="level" value="operator" required>Operator</th>
					<th><input type="radio" name="level" value="user" checked>Pelanggan</th>
						<?php
					} else if($data_ubah['level'] == 'admin') {
						?>
					<th><input type="radio" name="level" value="admin" checked>Admin</th>
						<?php
					}
					?>
				</tr>
			</table>
			</td>
			</tr>
			<?php
			} else {
			}
			?>
		</table>
		<table width="100%">
			<tr>
			<td><input type="submit" name="ubah_data" value="Simpan" class="tombol" /> <input type="reset" value="Reset" class="tombol" /> <input type="submit" name="tutup_data" value="Tutup" class="tombol" /></p></td>
			</tr>
		</table>
	</form>
</fieldset>