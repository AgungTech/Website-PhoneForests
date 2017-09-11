<h1 id="dialog_cari">Lihat Daftar HP</h1>
<div class="pencarian">
<form action="" method="post">
    <input type="text" name="teks_cari" placeholder="Masukkan Merk / Type / Kategori / Kondisi Ponsel..." class="ketik" />
    <input type="submit" onClick="#" name="cari_ponsel" value="Cari" class="tombol_cari" />
</form>
</div>
<?php
$teks_cari2 = @$_GET['teks_cari2'];
$batas = 10;
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
        echo '<a href="?isi=ponsel&mode=lihat_barang&halaman='.$halaman.'&perhalaman='.$batas.'#daftar_hp"><button class="'.$hal.'">'.$halaman.'</button></a>';
        if ($halaman < $total_halaman) {
            echo '<font style="text-shadow: 1px 1px 2px #000;font-weight:bold;">></font>';
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
$data_perhalaman = 10;
if (isset($_GET['perhalaman']) && !empty($_GET['perhalaman']))
    $data_perhalaman = (int)$_GET['perhalaman'];
 
// tabel yang akan diambil datanya
$nama_tabel = 'tb_ponsel';
 
// ambil data
$data_tabel = halaman($nama_tabel, $halaman, $data_perhalaman);

?>
<hr />
<div style="background-color:#DDD;width:100%;display:normal;">
<font style="text-shadow: 1px 1px 2px #000;color:#0DD;font-weight:bold;">Halaman : </font>
<?php
//menampilkan tombol paginasi
nomorhalaman($nama_tabel, $data_perhalaman);
?>
</div>
<hr />

<?php
            $klikdetail = @$_GET['detail_ponsel'];
            $NamaBulan = Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
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

                if($klikdetail !== "" && @$_SESSION['user']) {
                    $sqlll = mysql_query("SELECT * from tb_ponsel where kode_ponsel like '$klikdetail'") or die (mysql_error());
                    $datall = mysql_fetch_array($sqlll);
                    $isi_pesan = "<h1>Merk = ".$datall['merk']." Tipe = ".$datall['tipe']." Kategori = ".$datall['kategori']." harga = ".$datall['harga']."</h1>";
                } else {

                }


?>
<table align="center">
<tr>
<td>
<div id="konten_ponsel">
        <?php
        $sql4 = mysql_query("select * from tb_ponsel where merk like '%$teks_cari2%' or tipe like '%$teks_cari2%'") or die (mysql_error());
        //Membuat Format Harga Rupiah
        function rupiah($angka){
            $jadi="Rp.".number_format($angka,2,',','.');
            return $jadi;
        }
        $teks_cari = @$_POST['teks_cari'];
        $cari_ponsel = @$_POST['cari_ponsel'];
        if($cari_ponsel) {
            if($teks_cari != "") {
                $sql = mysql_query("select * from tb_ponsel where merk like '%$teks_cari%' or tipe like '%$teks_cari%' or kategori like '%$teks_cari%' or harga like '%$teks_cari%' or kondisi like '%$teks_cari%'") or die (mysql_error());
            } else {
                if($teks_cari2 == "") {
                    $sql = mysql_query("select * from tb_ponsel") or die (mysql_error());
                } else {
                    $sql = mysql_query("select * from tb_ponsel where merk like '%$teks_cari2%' or tipe like '%$teks_cari2%' or kategori like '%$teks_cari2%' or harga like '%$teks_cari2%' or kondisi like '%$teks_cari2%'") or die (mysql_error());
                }
            }
        } else {
            if($teks_cari2 == "") {
                $sql = mysql_query("select * from tb_ponsel") or die (mysql_error());
            } else {
                $sql = mysql_query("select * from tb_ponsel where merk like '%$teks_cari2%' or tipe like '%$teks_cari2%' or kategori like '%$teks_cari2%' or harga like '%$teks_cari2%' or kondisi like '%$teks_cari2%'") or die (mysql_error());
            }
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
                $klik = $data['kode_ponsel'];
                ?>
       <a fungsi="tombol_detail" href="?isi=ponsel&mode=lihat_barang&halaman=<?php echo $halaman; ?>&perhalaman=<?php echo $batas; ?>&detail_ponsel=<?php echo $klik;?>&teks_cari2=<?php if($teks_cari2 == ""){ echo $teks_cari; } else{ echo $teks_cari2; } ?>#konten_ponsel">
    <div id="isi_ponsel">
        <p style="text-shadow: 1px 1px 2px #000;background-color:#FFF;border:1px;border-radius:5px;padding:5px 0"><font color="black" size="4px"> <?php echo $data['merk'].' '.$data['tipe']; ?></font></p>
        <img class="gambar" src="gambar/<?php echo $data['gambar']; ?>" />
        <p class="keterangan">
        <?php
        if($data['kategori'] == 'android') {
            $data_kategori = "Android";
        } else if($data['kategori'] == 'blackberry') {
            $data_kategori = "Blackberry";
        } else if($data['kategori'] == 'mobile') {
            $data_kategori = "Mobile Phone";
        }
        if($data['kondisi'] == 'baru') {
            $data_kondisi = "Baru";
        } else if($data['kondisi'] == 'second') {
            $data_kondisi = "Second";
        } ?>
        <font color="white" size="2px">Kategori : <?php echo $data_kategori; ?></font></br>
        <font color="cyan" size="2px">Kondisi : <?php echo $data_kondisi; ?></font></br>
        <font color="red" size="2px">Harga : <?php echo rupiah($data['harga']); ?></font></p>
    </div>
        <?php
            }
        }
        ?>
</div>
</td>
</tr>
</table>
<div id="detail" class="dialog_detail">
<?php
$sql3 = mysql_query("SELECT * FROM tb_ponsel WHERE kode_ponsel = '$klikdetail'");
$data3 = mysql_fetch_array($sql3);
$detail_ponsel = $data3['detail'];
$cari_ponsel = @$_POST['cari_ponsel'];
if($klikdetail == '') {

} else {
    if(@$_POST['cari_ponsel']) {
        ?>
        <script>
        $('#detail').fadeOut();
        </script>
        <?php
    } else {
        ?>
        <script>
        $('#detail').fadeIn(1000, function() {
            $('.status').slideDown(1000);
        });
        </script>
        <?php
    }
}
if(@$_POST['tombol_memesan']) {
    if(@$_SESSION['user']) {
        $barang = mysql_query("INSERT into tb_kegiatan values('$tanggal_sekarang2', '$jam', '$user_aktif', 'Memesan Ponsel', '$isi_pesan')") or die (mysql_error());        
        if($barang) {
            $kode_user2 = $data_user['kode_user'];
            $sql_banyak = mysql_query("SELECT * FROM tb_kegiatan WHERE kode_user like '$kode_user2'") or die (mysql_error());
            $banyak_pesanan = mysql_fetch_array($sql_banyak);
            $jumlah_pesanan = mysql_num_rows($sql_banyak);
            echo "<h3 class='status'>".$data3['merk']." ".$data3['tipe']." berhasil dipesan sebanyak ".$jumlah_pesanan." kali</h3>";
        }
    } else {
            echo "<h3 class='status'>".$data3['merk']." ".$data3['tipe']." gagal dipesan, pemesanan hanya untuk pelanggan.</h3>";
    }
}
?>
<table>
<tr width="100%">
    <td width="50%"><img style="max-width:800px;" src="gambar/<?php echo $data3['gambar']; ?>" /></td>
    <td width="50%" style="text-align:left;border-left:2px">
        <p><font style="background-color:#555;color:#FFF;font-weight:bold;padding:10px;">Merk</font><font style="background-color:#099;color:#FFF;font-weight:bold;padding:10px;"><?php echo $data3['merk']; ?></font></p>
        <p><font style="background-color:#555;color:#FFF;font-weight:bold;padding:10px;">Tipe</font><font style="background-color:#09d;color:#FFF;font-weight:bold;padding:10px;"><?php echo $data3['tipe']; ?></font></p>
        <p><font style="background-color:#555;color:#FFF;font-weight:bold;padding:10px;">Kategori</font><font style="background-color:#095;color:#FFF;font-weight:bold;padding:10px;"><?php echo $data3['kategori']; ?></font></p>
        <p><font style="background-color:#555;color:#FFF;font-weight:bold;padding:10px;">Kondisi</font><font style="background-color:#DD0;color:#000;font-weight:bold;padding:10px;"><?php echo $data3['kondisi']; ?></font></p>
        <p><font style="background-color:#555;color:#FFF;font-weight:bold;padding:10px;">Harga</font><font style="background-color:#d00;color:#FFF;font-weight:bold;padding:10px;"><?php echo rupiah($data3['harga']); ?></font></p>
    </td>
</tr>
</table>
<?php
include "detail/".$detail_ponsel;
?>
<div class="tutup_detail">
<table align="center">
<tr><td>
<form action="" method="post">
<input type="submit" onclick="#konten_ponsel" name="tombol_memesan" value="Pesan" class="tombol" />
</form></td><td>
<button type="submit" fungsi="tutup_detail" class="tombol">Tutup</button></td></tr>
</table>
</div>
</div>

