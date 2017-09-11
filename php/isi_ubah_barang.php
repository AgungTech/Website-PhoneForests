<font color="#F00">
<?php
	$kodeponsel = @$_GET['kodeponsel'];
	$sql_ubah = mysql_query("select * from tb_ponsel where kode_ponsel = '$kodeponsel'") or die (mysql_error());
	$data_ubah = mysql_fetch_array($sql_ubah);
		$gambar = @$_FILES['gambar']['name'];
		$merk = @$_POST['merk'];
		$tipe = @$_POST['tipe'];
		$kategori = @$_POST['kategori'];
		$harga = @$_POST['harga'];
		$detail = @$_FILES['detail']['name'];
		$kondisi = @$_POST['kondisi'];
		$stok = @$_POST['stok'];
		$ubah_barang = @$_POST['ubah_barang'];
		$tutup_barang = @$_POST['tutup_barang'];
		if($tutup_barang) {
						?>
						<script type="text/javascript">
						window.location.href="?isi=ponsel&mode=kelola_barang";
						</script>
						<?php
		} else if($ubah_barang) {
			if($merk == "" || $tipe == "" || $harga == "" || $stok == "") {
				echo "Tidak boleh ada yang kosong";
			}else if($harga < 50000 || $stok < 0) {
				echo "Harga / Stok tidak Valid";
			} else {
				if($gambar == "" && $detail !== "") {
					$nama_detail = $kodeponsel.  '.html';
					$pindah_detail = move_uploaded_file(@$_FILES['detail']['tmp_name'], 'detail/'.$nama_detail);
					
					if($pindah_detail ) {
						mysql_query("update tb_ponsel set merk = '$merk', tipe = '$tipe', kategori = '$kategori', harga = '$harga', detail = '$nama_detail', kondisi = '$kondisi', stok = '$stok' where kode_ponsel = '$kodeponsel'") or die (mysql_error());
						echo "Data berhasil di Update";
						?>
						<script type="text/javascript">
						alert("Data berhasil di Update");
						window.location.href="?isi=ponsel&mode=ubah_barang&kodeponsel=<?php echo $kodeponsel; ?>";
						</script>
						<?php
					} else {
						echo "Gambar gagal di Upload";
					}
				} else if($detail == "" && $gambar !== "") {
					$nama_gambar = $kodeponsel . '.gif';
					$pindah_gambar = move_uploaded_file(@$_FILES['gambar']['tmp_name'], 'gambar/'.$nama_gambar);
					
					if($pindah_gambar) {
						mysql_query("update tb_ponsel set gambar = '$nama_gambar', merk = '$merk', tipe = '$tipe', kategori = '$kategori', harga = '$harga', kondisi = '$kondisi', stok = '$stok' where kode_ponsel = '$kodeponsel'") or die (mysql_error());
						echo "Data berhasil di Update";
						?>
						<script type="text/javascript">
						alert("Data berhasil di Update");
						window.location.href="?isi=ponsel&mode=ubah_barang&kodeponsel=<?php echo $kodeponsel; ?>";
						</script>
						<?php
					} else {
						echo "Detail gagal di Upload";
					}
				}  else if($detail !== "" && $gambar !== "") {
					$nama_gambar = $kodeponsel . '.gif';
					$nama_detail = $kodeponsel.  '.html';
					$pindah_gambar = move_uploaded_file(@$_FILES['gambar']['tmp_name'], 'gambar/'.$nama_gambar);
					$pindah_detail = move_uploaded_file(@$_FILES['detail']['tmp_name'], 'detail/'.$nama_detail);
					
					if($pindah_gambar || $pindah_detail ) {
						mysql_query("update tb_ponsel set gambar = '$gambar', merk = '$merk', tipe = '$tipe', kategori = '$kategori', harga = '$harga', detail = '$detail', kondisi = '$kondisi', stok = '$stok' where kode_ponsel = '$kodeponsel'") or die (mysql_error());
						echo "Data berhasil di Update";
						?>
						<script type="text/javascript">
						alert("Data berhasil di Update");
						window.location.href="?isi=ponsel&mode=ubah_barang&kodeponsel=<?php echo $kodeponsel; ?>";
						</script>
						<?php
					} else {
						echo "Gambar/Detail gagal di Upload";
					}
				}   else if($detail == "" && $gambar == "") {
						mysql_query("update tb_ponsel set merk = '$merk', tipe = '$tipe', kategori = '$kategori', harga = '$harga', kondisi = '$kondisi', stok = '$stok' where kode_ponsel = '$kodeponsel'") or die (mysql_error());
						echo "Data berhasil di Update";
						?>
						<script type="text/javascript">
						alert("Data berhasil di Update");
						window.location.href="?isi=ponsel&mode=ubah_barang&kodeponsel=<?php echo $kodeponsel; ?>";
						</script>
						<?php
					}
				} 
			}
		//Membuat Format Harga Rupiah
		function rupiah($angka){
			$jadi="Rp.".number_format($angka,2,',','.');
			return $jadi;
		}
?>
</font>

<fieldset id="dialog_ubah">
	<legend align="center"><h2>Ubah Data</h2></legend>
	<form action="" method="post" enctype="multipart/form-data">
		<table id="lihat_form">
			<tr align="left">
			<td width="50px">Kode-Ponsel</td>
			<td>:</td>
			<td width="100%"><input type="text" style="color:#999; font-weight: bold;" name="kode_ponsel" value="<?php echo $data_ubah['kode_ponsel']; ?>" class="ketik_teks" readonly /></td>
			</tr>
			<tr align="left">
			<td>Gambar</td>
			<td>:</td>
			<td>
			<table width="100%">
				<tr>
				<th><input type="file" accept=".jpg, .png, .gif" name="gambar" class="ketik_teks" /></th>
				<th align="right"><img src="gambar/<?php echo $data_ubah['gambar']; ?>" height="120px" align="center" class="lihat_gambar" /></th>
				</tr>
			</table>
			</td>
			</tr>
			<tr align="left">
			<td>Merk</td>
			<td>:</td>
			<td><input type="text" maxlength="10" name="merk" value="<?php echo $data_ubah['merk']; ?>" class="ketik_teks" required /></td>
			</tr>
			<tr align="left">
			<td>Tipe</td>
			<td>:</td>
			<td><input type="text" maxlength="20" name="tipe" value="<?php echo $data_ubah['tipe']; ?>" class="ketik_teks" required /></td>
			</tr>
			<tr align="left">
			<td>Kategori</td>
			<td>:</td>
			<td>
			<table>
				<tr>
					<?php
					if($data_ubah['kategori'] == 'android') {
						?>
							<th><input type="radio" name="kategori" value="android" required checked>Android</th>
							<th><input type="radio" name="kategori" value="blackberry">Blackberry</th>
							<th><input type="radio" name="kategori" value="mobile">Mobile Phone</th>
						<?php
					} else if($data_ubah['kategori'] == 'blackberry') {
						?>
							<th><input type="radio" name="kategori" value="android" required>Android</th>
							<th><input type="radio" name="kategori" value="blackberry" checked>Blackberry</th>
							<th><input type="radio" name="kategori" value="mobile">Mobile Phone</th>
						<?php
					} else if($data_ubah['kategori'] == 'mobile') {
						?>
							<th><input type="radio" name="kategori" value="android" required>Android</th>
							<th><input type="radio" name="kategori" value="blackberry">Blackberry</th>
							<th><input type="radio" name="kategori" value="mobile" checked>Mobile Phone</th>
						<?php
					}
					?>
				</tr>
			</table>
			</td>
			</tr>
			<tr align="left">
			<td>Harga</td>
			<td>:</td>
			<td><input type="number" name="harga" min="50000" max="30000000" value="<?php echo $data_ubah['harga']; ?>" class="ketik_teks" required /></td>
			</tr>
			<tr align="left">
			<td>Detail</td>
			<td>:</td>
			<td style="width:100%"><p style="margin:0;padding:0;white-space:nowrap;"><input type="file" name="detail" style="width:60%" class="ketik_teks" /> <font> File  "<?php echo $data_ubah['detail']; ?>"</font></p></td>
			</tr>
			<tr align="left">
			<td>Kondisi</td>
			<td>:</td>
			<td>
			<table>
				<tr>
					<?php
					if($data_ubah['kondisi'] == 'baru') {
						?>
					<th><input type="radio" name="kondisi" value="baru" required checked>Baru</th>
					<th><input type="radio" name="kondisi" value="second">Second</th>
						<?php
					} else if($data_ubah['kondisi'] == 'second') {
						?>
					<th><input type="radio" name="kondisi" value="baru" required>Baru</th>
					<th><input type="radio" name="kondisi" value="second" checked>Second</th>
						<?php
					}
					?>
				</tr>
			</table>
			</td>
			</tr>
			<tr align="left">
			<td>Stok</td>
			<td>:</td>
			<td><input type="number" min="0" max="999" name="stok" value="<?php echo $data_ubah['stok']; ?>" class="ketik_teks" required /></td>
			</tr>
		</table id="lihat_form">
		<table width="100%">
			<tr>
			<td><input type="submit" name="ubah_barang" value="Simpan" class="tombol" /> <input type="reset" value="Reset" class="tombol" /> <input type="submit" name="tutup_barang" value="Tutup" class="tombol" /></p></td>
			</tr>
		</table>
	</form>
</fieldset>