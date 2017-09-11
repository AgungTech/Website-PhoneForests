<?php
$_REQUEST["hari_sekarang2"] = date("j");
$_REQUEST["bulan_sekarang2"] = date("n");
$_REQUEST["tahun_sekarang2"] = date("Y");
$hari_sekarang2 = $_REQUEST["hari_sekarang2"];
$bulan_sekarang2 = $_REQUEST["bulan_sekarang2"];
$tahun_sekarang2 = $_REQUEST["tahun_sekarang2"];
$tanggal_sekarang2 = $tahun_sekarang2."/".$bulan_sekarang2."/".$hari_sekarang2;
if (strlen($hari_sekarang2) < 2) {
    $hari_sekarang2 = "0".$hari_sekarang2;
} else {
    $hari_sekarang2 = $hari_sekarang2;
}
if (strlen($bulan_sekarang2) < 2) {
	$tanggal_sekarang2 = $tahun_sekarang2."/0".$bulan_sekarang2."/".$hari_sekarang2;
} else {
	$tanggal_sekarang2 = $tahun_sekarang2."/".$bulan_sekarang2."/".$hari_sekarang2;
}
date_default_timezone_set("Asia/Bangkok");
$t = microtime(true);
$micro = sprintf("%06d",($t - floor($t)) * 1000000);
$jam = date("H:i:s.".$micro, $t);
?>		<table align="center">
		<tr><td>
		<div class="judul"><h1>Kirim SMS</h1></div>
		</tr></th>
		<tr align="center"><td align="center">
		<div class="isi">
		<?php
		if(@$_SESSION['admin'] || @$_SESSION['operator'] || @$_SESSION['user']) {
			?>
			<div class="percakapan">
			<?php
				$sql10 = mysql_query("SELECT * FROM tb_kegiatan WHERE nama_kegiatan LIKE 'Mengirim SMS' ORDER BY tanggal asc") or die (mysql_error());
				$cek10 = mysql_num_rows($sql10);
				if($cek10 < 1) {
					?>
					<table>
						<tr>
							<th><p style="background-color:#fff;">Tidak ada percakapan</p></th>
						</tr>
					</table>
					<?php
				} else {
					include 'percakapan.php';
				}
			?>
			</div>
			<?php
		} else {
			?>
			<div style ="margin-top:50px;">
			<table>
				<tr>
					<th><p style="background-color:#fff;">Belum Masuk</p></th>
				</tr>
			</table>
			</div>
			<?php
		}
			if(@$_SESSION['admin'] || @$_SESSION['operator'] || @$_SESSION['user']) {
		?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/kirim_sms.js"></script>
			<form method="post" name="form" action="">
				<div class="isi_sms" style="margin-top:10px;">
					<textarea maxlength="500" name="isi_sms" id="isi_sms" placeholder="Ketikkan Pesan...." class="ketik" style="resize:none;"></textarea>
			</form>
				<div class="tombol_sms" style="margin-top:1px;margin-bottom:5px;">
				<table>
				<tr><td>
					<input type="submit" name="kirim_sms" id="klik_sms" value="Kirim" class="tombol" /></td><td><div id="tutup_sms" class="tombol">Tutup</div></td></tr></table>
				</div>
				<div>
					<button id="tanggal_sekarang2" value="<?php echo $tanggal_sekarang2;?>" disabled></button><textarea style="width:120px;height:25px;resize:none;" id="waktu" disabled></textarea><button id="user_aktif" value="<?php echo $user_aktif;?>" disabled></button>
				</div>
			<?php
			} else {
				?>
				<div class="tombol_sms" style="margin-top:1px;margin-bottom:5px;">
					<div id="tutup_sms" class="tombol">Tutup</div>
				</div>
				<?php
			} ?>
		</div>
		</tr></th>
		</table>
