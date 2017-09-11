				<?php
				include 'koneksi.php';
					$sql10 = mysql_query("SELECT * FROM tb_kegiatan WHERE nama_kegiatan LIKE 'Mengirim SMS' ORDER BY tanggal asc") or die (mysql_error());
					$cek10 = mysql_num_rows($sql10);
					while($data10 = mysql_fetch_array($sql10)) {
						$jam_ini = $data10['jam'];
						$namauser = $data10['kode_user'];
						$sql6 = mysql_query("SELECT * from tb_masuk WHERE kode_user like '$namauser'") or die (mysql_error());
						$data6 = mysql_fetch_array($sql6);
			            if($data6['level'] == 'admin' || $data6['level'] == 'operator') {
							echo "<table class='pengelola'><tr><th>"
							.$data6['level']." : ".$data6['username'].
							"</th><th width='160px'>| ".$data10['tanggal']." | ".substr($data10['jam'], 0, 8)." |</th></tr><tr><td>"
							.$data10['detail'].
							"</table>";
			            } else if($data6['level'] == 'user') {
							echo "<table class='pelanggan'><tr><th>"
							.$data6['level']." : ".$data6['username'].
							"</th><th width='160px'>| ".$data10['tanggal']." | ".substr($data10['jam'], 0, 8)." |</th></tr><tr><td>"
							.$data10['detail'].
							"</table>";
			            }
					}
				?>