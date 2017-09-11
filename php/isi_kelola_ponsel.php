<h1>Kelola Daftar HP</h1>
<font color="#F00">
		<?php
		$kode_ponsel = @$_POST['kode_ponsel'];
		$gambar = @$_FILES['gambar']['name'];
		$merk = @$_POST['merk'];
		$tipe = @$_POST['tipe'];
		$kategori = @$_POST['kategori'];
		$harga = @$_POST['harga'];
		$detail = @$_FILES['detail']['name'];
		$kondisi = @$_POST['kondisi'];
		$stok = @$_POST['stok'];
		$tambah_barang = @$_POST['tambah_barang'];
		
		//Membuat  kode_ponsel  Menjadi Otomatis
		$carikode = mysql_query("select max(kode_ponsel) from tb_ponsel") or die (mysql_error());
		$datakode = mysql_fetch_array($carikode);
		if($datakode) {
			$nilaikode = substr($datakode[0], 1);
			$kode = (int) $nilaikode;
			$kode = $kode + 1;
			$hasilkode = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
		} else {
			$hasilkode = "P0001";
		}
		//Format Hari Ini
		if (!isset($_REQUEST["hari"])) $_REQUEST["hari"] = date("j");
		if (!isset($_REQUEST["bulan"])) $_REQUEST["bulan"] = date("n");
		if (!isset($_REQUEST["tahun"])) $_REQUEST["tahun"] = date("Y");

		$cHari = $_REQUEST["hari"];
		$cBulan = $_REQUEST["bulan"];
		$cTahun = $_REQUEST["tahun"];

		$pilih_hari = $cHari;
		$pilih_bulan = $cBulan;
		$pilih_tahun = $cTahun;

		if (strlen($cBulan) < 2) {
		    $tanggal_db = $cTahun."/0".$cBulan."/".$cHari;
		} else {
		    $tanggal_db = $cTahun."/".$cBulan."/".$cHari;
		}
		date_default_timezone_set("Asia/Bangkok");
		$jam = date("H:i:s");
		$kode_user = $data_user['kode_user'];
		$nama_kegiatan = "Menambahkan Ponsel";
		$detail_kegiatan = "ugsjdcsd"
		.$kode_ponsel


		;
		if($tambah_barang) {
			mysql_query("insert into tb_kegiatan values('$tanggal_db', '$jam', '$kode_user', '$nama_kegiatan', '$detail_kegiatan')") or die (mysql_error());
			if($merk == "" || $tipe == "" || $kategori == "" || $harga == "" || $kondisi == "" || $stok == "") {
				echo "Tidak boleh ada yang kosong";
			} else if($stok < 0) {
				echo "Stok tidak Valid";
			} else if($detail == "" && $gambar !== "") {
				$nama_gambar = $kode_ponsel  .'.gif';
				$nama_detail = 'Kosong'. '.html';
				$pindah_gambar = move_uploaded_file(@$_FILES['gambar']['tmp_name'], 'gambar/'.$nama_gambar);				
				if($pindah_gambar) {
					mysql_query("insert into tb_ponsel values('$kode_ponsel', '$nama_gambar', '$merk', '$tipe', '$kategori', '$harga', '$nama_detail', '$kondisi', '$stok')") or die (mysql_error());
						?>
						<script type="text/javascript">
						alert("Barang berhasil ditambahkan. Upload = <?php echo $gambar; ?>");
						window.location.href="?isi=ponsel&mode=kelola_barang";
						</script>
						<?php
				} else {
					echo "Gambar gagal di Upload";
				}
			}else if($gambar == "" && $detail !== "") {
				$nama_gambar = 'Kosong'.'.gif';
				$nama_detail = $kode_ponsel. '.html';
				$pindah_detail = move_uploaded_file(@$_FILES['detail']['tmp_name'], 'detail/'.$nama_detail);
				
				if($pindah_detail ) {
					mysql_query("insert into tb_ponsel values('$kode_ponsel', '$nama_gambar', '$merk', '$tipe', '$kategori', '$harga', '$nama_detail', '$kondisi', '$stok')") or die (mysql_error());
						?>
						<script type="text/javascript">
						alert("Barang berhasil ditambahkan");
						window.location.href="?isi=ponsel&mode=kelola_barang";
						</script>
						<?php
				} else {
					echo "Detail gagal di Upload";
				}
			}else if($gambar == "" && $detail == "") {
				$nama_gambar = 'Kosong'.'.gif';
				$nama_detail = 'Kosong'. '.html';
				mysql_query("insert into tb_ponsel values('$kode_ponsel', '$nama_gambar', '$merk', '$tipe', '$kategori', '$harga', '$nama_detail', '$kondisi', '$stok')") or die (mysql_error());
				?>
				<script type="text/javascript">
					alert("Barang berhasil ditambahkan");
					window.location.href="?isi=ponsel&mode=kelola_barang";
				</script>
				<?php
			} else {
				$nama_gambar = $kode_ponsel  .'.gif';
				$nama_detail = $kode_ponsel. '.html';
				$pindah_gambar = move_uploaded_file(@$_FILES['gambar']['tmp_name'], 'gambar/'.$nama_gambar);
				$pindah_detail = move_uploaded_file(@$_FILES['detail']['tmp_name'], 'detail/'.$nama_detail);
				
				if($pindah_gambar || $pindah_detail ) {
					mysql_query("insert into tb_ponsel values('$kode_ponsel', '$nama_gambar', '$merk', '$tipe', '$kategori', '$harga', '$nama_detail', '$kondisi', '$stok')") or die (mysql_error());
						?>
						<script type="text/javascript">
						alert("Barang berhasil ditambahkan");
						window.location.href="?isi=ponsel&mode=kelola_barang";
						</script>
						<?php
				} else {
					echo "Gambar/Detail gagal di Upload";
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
<div class="pencarian">
<form action="" method="post" width="400px">
	<input type="text" name="teks_cari" placeholder="Masukkan Merk / Type / Kategori / Kondisi Ponsel..." class="ketik" />
	<input type="submit" onClick="#" name="cari_ponsel" value="Cari" class="tombol_cari" />
</form>
</div>
<hr />
<fieldset id="dialog_tambah">
	<legend align="center"><h2>Tambah Barang</h2></legend>
	<form action="" method="post" enctype="multipart/form-data">
		<table id="lihat_form">
			<tr align="left">
			<td width="50px">Kode-Ponsel</td>
			<td>:</td>
			<td width="100%"><input type="text" style="color:#999; font-weight: bold;" name="kode_ponsel" value="<?php echo $hasilkode; ?>"class="ketik_teks" readonly /></td>
			</tr>
			<tr align="left">
			<td>Gambar</td>
			<td>:</td>
			<td><input type="file" accept=".jpg, .png, .gif, .swf" name="gambar" class="ketik_teks" /></td>
			</tr>
			<tr align="left">
			<td>Merk</td>
			<td>:</td>
			<td><input type="text" maxlength="10" name="merk" class="ketik_teks" required /></td>
			</tr>
			<tr align="left">
			<td>Tipe</td>
			<td>:</td>
			<td><input type="text" maxlength="20" name="tipe" class="ketik_teks" required /></td>
			</tr>
			<tr align="left">
			<td>Kategori</td>
			<td>:</td>
			<td>
				<select name="kategori" class="ketik_teks" required>
					<option value=""></option>
					<option value="android">Android</option>
					<option value="blackberry">Blackberry</option>
					<option value="mobile">Mobile Phone</option>
				</select>
			</td>
			</tr>
			<tr align="left">
			<td>Harga</td>
			<td>:</td>
			<td><input type="number" name="harga" min="50000" max="30000000" class="ketik_teks" required /></td>
			</tr>
			<tr align="left">
			<td>Detail</td>
			<td>:</td>
			<td><input type="file" accept=".html, .xml, .xhtml, .php" name="detail" class="ketik_teks" /></td>
			</tr>
			<tr align="left">
			<td>Kondisi</td>
			<td>:</td>
			<td>
			<table class="ketik_teks">
				<tr>
					<th><input type="radio" name="kondisi" value="baru" required>Baru</th>
					<th><input type="radio" name="kondisi" value="second">Second</th>
				</tr>
			</table>
			</td>
			</tr>
			<tr align="left">
			<td>Stok</td>
			<td>:</td>
			<td><input type="number" name="stok" min="0" max="999" class="ketik_teks" required /></td>
			</tr>
		</table id="lihat_form">
		<table width="100%">
			<tr>
			<td><input type="submit" name="tambah_barang" value="Tambah" class="tombol" /> <input type="reset" value="Reset" class="tombol" /></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php
function halaman($nama_tabel, $halaman = 1, $batas = 20) {
	$teks_cari = @$_POST['teks_cari'];
	$cari_ponsel = @$_POST['cari_ponsel'];
    $data_tabel = array();
    $kolom_pertama = ($halaman - 1) * $batas;
	if($cari_ponsel) {
		if($teks_cari != "") {
			$pilih_data = mysql_query("SELECT * FROM tb_ponsel where merk like '%$teks_cari%' or tipe like '%$teks_cari%' or kategori like '%$teks_cari%' or harga like '$teks_cari' or kondisi like '%$teks_cari%'");
		} else {
			$pilih_data = mysql_query('SELECT * FROM `'.$nama_tabel.'` LIMIT '.$kolom_pertama.', '.$batas);
		}
	} else {
		$pilih_data = mysql_query('SELECT * FROM `'.$nama_tabel.'` LIMIT '.$kolom_pertama.', '.$batas);
	}
	while ($tampilkan_data = mysql_fetch_array($pilih_data))
    array_push($data_tabel, $tampilkan_data);
    return $data_tabel;
}

function nomorhalaman($nama_tabel, $batas = 20) {
	$teks_cari = @$_POST['teks_cari'];
	$cari_ponsel = @$_POST['cari_ponsel'];
	if($cari_ponsel) {
		if($teks_cari != "") {
			$sql_total = mysql_query("SELECT COUNT(*) AS total FROM tb_ponsel where merk like '%$teks_cari%' or tipe like '%$teks_cari%' or kategori like '%$teks_cari%' or harga like '$teks_cari' or kondisi like '%$teks_cari%'");
		} else {
			$sql_total = mysql_query('SELECT COUNT(*) AS total FROM `'.$nama_tabel.'`');
		}
	} else {
		$sql_total = mysql_query('SELECT COUNT(*) AS total FROM `'.$nama_tabel.'`');
	}
	$sql_hasil = mysql_fetch_array($sql_total);
    $total_data = $sql_hasil['total'];
    $total_halaman = ceil($total_data / $batas);
    $halaman = 1;
    $halaman_sekarang = @$_GET['halaman'];
    while ($halaman <= $total_halaman) {
        if($halaman == $halaman_sekarang) {
            $hal = "nomor_halaman";
        } else {
            $hal = "nomor_halaman_2";
        }
        echo '<a href="?isi=ponsel&mode=kelola_barang&halaman='.$halaman.'&perhalaman='.$batas.'#dialog_cari"><button class="'.$hal.'">'.$halaman.'</button></a>';
        if ($halaman < $total_halaman) {
            echo '<font style="text-shadow: 1px 1px 2px #000;color:#0DD;font-weight:bold;">></font>';
		}
        $halaman++;
    }
}
// untuk mengetahui halaman keberapa yang sedang dibuka
// juga untuk men-set nilai default ke halaman 1 jika tidak ada
// data $_GET['page'] yang dikirimkan
$halaman = 1;
if (isset($_GET['halaman']) && !empty($_GET['halaman']))
    $halaman = (int)$_GET['halaman'];
 
// untuk mengetahui berapa banyak data yang akan ditampilkan
// juga untuk men-set nilai default menjadi 5 jika tidak ada
// data $_GET['perPage'] yang dikirimkan
$data_perhalaman = 20;
if (isset($_GET['perhalaman']) && !empty($_GET['perhalaman']))
    $data_perhalaman = (int)$_GET['perhalaman'];
 
// tabel yang akan diambil datanya
$nama_tabel = 'tb_ponsel';
 
// ambil data
$data_tabel = halaman($nama_tabel, $halaman, $data_perhalaman);

?>

<fieldset>
	<legend align="center"><h2>Kelola Barang</h2></legend>
		<table width="85%" align="center">
		<tr>
		<td align="left">
				<button align="left" id="tambah" class="tombol">Tambah Barang</button>
			</td>
			<td>
			</td>
			<td align="right" width="390px">
			</td>
		</tr>
		</table>
	<hr id="dialog_cari"/>
	<div style="background-color:#DDD;width:100%;display:normal;">
	<font style="text-shadow: 1px 1px 2px #000;color:#0DD;font-weight:bold;">Halaman : </font>
	<?php
	//menampilkan tombol paginasi
	nomorhalaman($nama_tabel, $data_perhalaman);
	?>
	</div>

	<table width="85%" align="center" id="tb_kelola_barang" class="tablesorter">
		<thead>
		<tr class="judul">
			<th><p class="kolom">Kode Barang</p></th>
			<th>Gambar</th>
			<th>Merk</th>
			<th>Tipe</th>
			<th>Kategori</th>
			<th>Harga</th>
			<th>Detail</th>
			<th>Kondisi</th>
			<th width="6%">Stok</th>
			<th>Opsi</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$teks_cari = @$_POST['teks_cari'];
		$cari_ponsel = @$_POST['cari_ponsel'];
		if($cari_ponsel) {
			if($teks_cari != "") {
				$sql = mysql_query("select * from tb_ponsel where merk like '%$teks_cari%' or tipe like '%$teks_cari%' or kategori like '%$teks_cari%' or harga like '%$teks_cari%' or kondisi like '%$teks_cari%'") or die (mysql_error());
			} else {
				$sql = mysql_query("select * from tb_ponsel") or die (mysql_error());
			}
		} else {
			$sql = mysql_query("select * from tb_ponsel") or die (mysql_error());
		}
		
		$cek = mysql_num_rows($sql);
		if($cek < 1) {
			?>
			<tr>
				<td colspan="10">Data tidak ditemukan</td>
			</tr>
			<?php
		} else {
        foreach ($data_tabel as $i => $data) {
            $nomor = ($i + 1) + (($halaman - 1) * $data_perhalaman);
				$harga = $data['harga'];
				?>
			<tr>
				<td><?php echo $data['kode_ponsel']; ?></td>
				<td><?php echo $data['gambar']; ?></td>
				<td><?php echo $data['merk']; ?></td>
				<td><?php echo $data['tipe']; ?></td>
				<td style="text-transform:capitalize;"><?php echo $data['kategori']; ?></td>
				<td><?php echo rupiah("$harga"); ?></td>
				<td><?php echo $data['detail']; ?></td>
				<td style="text-transform:capitalize;"><?php echo $data['kondisi']; ?></td>
				<td><?php echo $data['stok']; ?></td>
				<td>
				<?php
				if(@$_SESSION['admin'] || @$_SESSION['operator']) {
				?>
					<p class="kolom"><a href="?isi=ponsel&mode=ubah_barang&kodeponsel=<?php echo $data['kode_ponsel']; ?>"><button onclick="dialogUbah()" class="tombol">Ubah</button></a>
					<a onClick="return confirm('Yakin ingin menghapus data ?')"href="?isi=ponsel&mode=hapus_barang&kodeponsel=<?php echo $data['kode_ponsel']; ?>"><button class="tombol">Hapus</button></a></p>
				<?php
				} else {
					echo"Tidak ada";
				}
				?>
				</td>
			</tr>
		<?php
			}
		}
		?>
		</tbody>
	</table>
</fieldset>