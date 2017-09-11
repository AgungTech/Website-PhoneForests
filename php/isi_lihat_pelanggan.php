<h1>Lihat Pelanggan</h1>
<div class="pencarian">
<form action="" method="post" width="400px">
    <input type="text" name="teks_cari" placeholder="Masukkan Nama / Jenis Kegiatan..." class="ketik" />
    <input type="submit" onClick="#" name="cari_ponsel" value="Cari" class="tombol_cari" />
</form>
</div>
<?php
$NamaBulan = Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
$NamaHari = Array("Minggu", "Senin", "Selasa", "Rabu", "kamis", "Jum\'at", "Sabtu");
if (!isset($_REQUEST["hari"])) $_REQUEST["hari"] = date("j");
if (!isset($_REQUEST["bulan"])) $_REQUEST["bulan"] = date("n");
if (!isset($_REQUEST["tahun"])) $_REQUEST["tahun"] = date("Y");

$_REQUEST["hari_sekarang"] = date("j");
$_REQUEST["bulan_sekarang"] = date("n");
$_REQUEST["tahun_sekarang"] = date("Y");

$cHari = $_REQUEST["hari"];
$cBulan = $_REQUEST["bulan"];
$cTahun = $_REQUEST["tahun"];

$hari_sekarang = $_REQUEST["hari_sekarang"];
$bulan_sekarang = $_REQUEST["bulan_sekarang"];
$tahun_sekarang = $_REQUEST["tahun_sekarang"];

$pilih_hari = @$_GET["hari"];
$pilih_bulan = @$_GET["bulan"];
$pilih_tahun = @$_GET["tahun"];

$tanggal = $pilih_tahun."/".$pilih_bulan."/".$pilih_hari;
$tanggal_pilih = $cTahun."/".$cBulan."/".$cHari;
$tanggal_sekarang = $tahun_sekarang."/".$bulan_sekarang."/".$hari_sekarang;
$mingguan = getdate(date("U"));
$seminggu = $mingguan['wday'];
if($seminggu > 7) {
 $seminggu = 0;
} else if($seminggu < 0) {
 $seminggu = 7;
}

$tanggal_kata = $pilih_hari." ".$NamaBulan[$pilih_bulan-1]." ".$pilih_tahun;

$prev_tahun = $cTahun;
$next_tahun = $cTahun;
$prev_bulan = $cBulan-1;
$next_bulan = $cBulan+1;

if ($next_bulan == 13 ) {
$next_bulan = 1;
$next_tahun = $cTahun + 1;
}
if ($prev_bulan == 0 ) {
$prev_bulan = 12;
$prev_tahun = $cTahun - 1;
}

if (strlen($cHari) < 2) {
    $cHari = "0".$cHari;
} else {
    $cHari = $cHari;
}
if (strlen($hari_sekarang) < 2) {
    $hari_sekarang = "0".$hari_sekarang;
} else {
    $hari_sekarang = $hari_sekarang;
}
if (strlen($cBulan) < 2) {
    $tanggal_db = $cTahun."/0".$cBulan."/".$cHari;
    $tanggal_urut = $cHari."/0".$cBulan."/".$cTahun;
    $tanggal_ini = $hari_sekarang."/0".$bulan_sekarang."/".$tahun_sekarang;
    $tanggal_cek = $cTahun."0".$cBulan.$cHari;
    $tanggal_cek2 = $tahun_sekarang."0".$bulan_sekarang.$hari_sekarang;
} else {
    $tanggal_db = $cTahun."/".$cBulan."/".$cHari;
    $tanggal_urut = $cHari."/".$cBulan."/".$cTahun;
    $tanggal_ini = $hari_sekarang."/".$bulan_sekarang."/".$tahun_sekarang;
    $tanggal_cek = $cTahun.$cBulan.$cHari;
    $tanggal_cek2 = $tahun_sekarang.$bulan_sekarang.$hari_sekarang;
}

        $teks_cari = @$_POST['teks_cari'];
        $teks_cari2 = @$_GET['teks_cari2'];
        $cari_ponsel = @$_POST['cari_ponsel'];
        $sql4 = mysql_query("select * from tb_masuk where nama_lengkap like '%$teks_cari2%'") or die (mysql_error());
        $data4 = mysql_fetch_array($sql4);
        $cek4 = mysql_num_rows($sql4);
        $cari_nama2 = $data4['kode_user'];
        if($teks_cari == "") {
            if($tanggal_cek > $tanggal_cek2){
                $cari_nama = " Sekarang masih tanggal  ".$tanggal_ini.", Belum ada kegiatan pada tanggal  ".$tanggal_urut.".";                
            } else {
                $cari_nama = "Tidak ada kegiatan pada tanggal  ".$tanggal_urut.".";                
            }
        } else {
            $sql4 = mysql_query("select * from tb_masuk where nama_lengkap like '%$teks_cari%'") or die (mysql_error());
            $data4 = mysql_fetch_array($sql4);
            $cek4 = mysql_num_rows($sql4);
            $cari_nama = $data4['kode_user'];
        }
        if($cari_ponsel) {
            $teks_cari2 = "";
            if($teks_cari != "") {
                if($cek4 < 1) {
                    $sql2 = mysql_query("select * from tb_kegiatan WHERE nama_kegiatan like '%$teks_cari%' order by tanggal asc") or die (mysql_error());
                    $cari_nama = "Pencarian \"".$teks_cari."\" tidak ditemukan";
                } else {
                    $sql2 = mysql_query("select * from tb_kegiatan WHERE kode_user like '$cari_nama' order by tanggal asc") or die (mysql_error());
                }
            } else {
                $sql2 = mysql_query("select * from tb_kegiatan WHERE tanggal like '%$tanggal_db%'") or die (mysql_error());
            }
        } else {
            if($teks_cari2 == "") {
                $sql2 = mysql_query("select * from tb_kegiatan WHERE tanggal like '%$tanggal_db%'") or die (mysql_error());
            } else {
                if($cari_nama2 == ""){
                    $sql2 = mysql_query("select * from tb_kegiatan WHERE nama_kegiatan like '%$teks_cari2%' order by tanggal asc") or die (mysql_error());
                } else {
                    $sql2 = mysql_query("select * from tb_kegiatan WHERE kode_user like '$cari_nama2' order by tanggal asc") or die (mysql_error());
                }
            }
        }
$cek2 = mysql_num_rows($sql2);
?>
<fieldset>
    <legend align="center">
    <div id="kalender" style="background-color:#DDD;width:100%;display:normal;text-align:center;">
    <font style="text-shadow: 1px 1px 2px #000;color:#0DD;font-weight:bold;">Kegiatan Tanggal <?php echo $tanggal_kata; ?> : </font>
    </div></legend>
        <table width="85%" align="center">
        <tr>
        <td align="center">
            <table width="40%" id="tb_kelola_barang">
            <tr align="center">
            <td bgcolor="#999999" style="color:#FFFFFF">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="33%" align="left"> <a href="<?php echo $_SERVER["PHP_SELF"] . "?isi=pelanggan&mode=lihat_data&hari=".$cHari."&bulan=". $prev_bulan . "&tahun=" . $prev_tahun; ?>#kalender" style="text-shadow: 1px 1px 2px #000;color:#0DD;font-weight:bold;padding:5px;">Sebelumnya</a></td>
            <td width="33%" align="center"> <a href="<?php echo $_SERVER["PHP_SELF"] . "?isi=pelanggan&mode=lihat_data&hari=".$hari_sekarang."&bulan=". $bulan_sekarang . "&tahun=" . $tahun_sekarang; ?>#kalender" style="text-shadow: 1px 1px 2px #000;color:#0DD;font-weight:bold;padding:5px;">Ke Hari Ini</a></td>
            <td width="33%" align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?isi=pelanggan&mode=lihat_data&hari=".$cHari."&bulan=". $next_bulan . "&tahun=" . $next_tahun; ?>#kalender" style="text-shadow: 1px 1px 2px #000;color:#0DD;font-weight:bold;padding:5px;">Selanjutnya</a> </td>
            </tr>
            </table>
            </td>
            </tr>
            <tr>
            <td colspan="7" bgcolor="#999999" style="color:#FFFFFF" align="center"><strong><?php echo $NamaBulan[$cBulan-1].' '.$cTahun; ?></strong></td>
            </tr>
            <tr>
            <td align="center">
            <table width="100%" bgcolor="#000" style="color:#fff" border="0" cellpadding="2" cellspacing="2">
            <tr align="center">
            </tr>
            <tr>
            <th><strong>Minggu</strong></th>
            <th><strong>Senin</strong></th>
            <th><strong>Selasa</strong></th>
            <th><strong>Rabu</strong></th>
            <th><strong>Kamis</strong></th>
            <th><strong>Jum'at</strong></th>
            <th><strong>Sabtu</strong></th>
            </tr>
<?php
$timestamp = mktime(0,0,0,$cBulan,1,$cTahun);
$maxday = date("t",$timestamp);
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];


for ($i=0; $i<($maxday+$startday); $i++) {
if(($i % 7) == 0 ) echo "<tr>";
if($i < $startday) echo "<td></td>";
else {
    if($pilih_tahun."/".$pilih_bulan."/".($i - $startday + 1) == $tanggal_pilih) {
        $warna_hari = "hari_pilih";
        $klik_hari = "Hari yang Dipilih";
    } else {
        if($pilih_tahun."/".$pilih_bulan."/".($i - $startday + 1) == $tanggal_sekarang) {
            $warna_hari = "hari_ini";
            $klik_hari = "Hari Ini";
        } else {
            $warna_hari = "";
            $klik_hari = "Klik untuk Pilih Hari";
        }
    }
    echo "<td align='center' valign='middle' height='20px' class='".$warna_hari."'><a href='?isi=pelanggan&mode=lihat_data&hari=".($i - $startday + 1)."&bulan=".$cBulan."&tahun=".$cTahun."#kalender' tooltip='".$klik_hari."'>".($i - $startday + 1)."</a></td>";
}
if(($i % 7) == 6 ) echo "</tr>";
}
?>
            </table>
            </td>
            </tr>
            </table>
            <hr id="dialog_cari"/>
        </td>
        </tr>
        </table>

    <table width="85%" align="center" id="tb_kelola_barang" class="tablesorter">
        <thead>
        <tr class="judul">
            <th><p class="kolom">Jam</p></th>
            <th>Nama</th>
            <th>Level</th>
            <th>Kegiatan</th>
            <th>Opsi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $cek = mysql_num_rows($sql2);
        if($cek < 1) {
            ?>
            <tr>
                <td colspan="5"><?php echo $cari_nama; ?></td>
            </tr>
            <?php
        } else {
            while($data2 = mysql_fetch_array($sql2)) {
                $kode_user = $data2['kode_user'];
                $sql = mysql_query("select * from tb_masuk where kode_user like '%$kode_user%'") or die (mysql_error());
                $data = mysql_fetch_array($sql);
                $klik = $data2['jam'];
                ?>
            <tr>
                <td><?php echo substr($data2['jam'], 0, 8); ?></td>
                <td><?php echo $data['nama_lengkap']; ?></td>
                <td style="text-transform:capitalize;"><?php echo $data['level']; ?></td>
                <td><?php echo $data2['nama_kegiatan']; ?></td>
                <td>
                <?php
                if(@$_SESSION['admin'] || @$_SESSION['operator']) {
                ?>
                    <p class="kolom"><a href="?isi=pelanggan&mode=lihat_data&hari=<?php echo $cHari; ?>&bulan=<?php echo $cBulan; ?>&tahun=<?php echo $cTahun; ?>&detail=<?php echo $klik;?>&teks_cari2=<?php if($teks_cari2 == ""){ echo $teks_cari; } else{ echo $teks_cari2; } ?>#kalender"><button fungsi="tombol_detail" class="tombol">Detail</button></a>
                    <a onClick="return confirm('Yakin ingin menghapus data ?')" href="?isi=pelanggan&mode=hapus_kegiatan&hari=<?php echo $cHari; ?>&bulan=<?php echo $cBulan; ?>&tahun=<?php echo $cTahun; ?>&teks_cari=<?php if($teks_cari2 == ""){ echo $teks_cari; } else{ echo $teks_cari2; } ?>&jam=<?php echo $data2['jam']; ?>"><button class="tombol">Hapus</button></a></p>
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

<div id="detail" class="dialog_detail">
<?php
$klikdetail = @$_GET['detail'];
$sql3 = mysql_query("SELECT * FROM tb_kegiatan WHERE jam = '$klikdetail'");
$data3 = mysql_fetch_array($sql3);
$detail_kegiatan = $data3['detail'];
if($klikdetail == 0) {
} else {
    if($cari_ponsel) {
        ?>
        <script>
        $('#detail').fadeOut();
        </script>
        <?php
    } else {
        ?>
        <script>
        $('#detail').fadeIn(1000);
        </script>
        <?php
    }
}

echo $detail_kegiatan."</br>";
?>
<div class="tutup_detail">
<button fungsi="tutup_detail" class="tombol">Tutup</button>
</div>
<script>
</script>
</div>
