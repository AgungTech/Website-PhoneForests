<?php
if(@$_POST['registrasi']) {
	$user =  @$_POST['user'];
	$pass =  @$_POST['pass'];
	$nama =  @$_POST['nama'];
	$gender =  @$_POST['gender'];
	$alamat =  @$_POST['alamat'];
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
	//Membuat  kode  Menjadi Otomatis
	$carikode = mysql_query("select max(kode_user) from tb_masuk") or die (mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if($datakode) {
		$nilaikode = $datakode[0];
		$kode = (int) $nilaikode;
		$kode = $kode +1;
		$hasilkode = $kode;
	} 
	$erviana = pow($hasilkode,2);
	$novia = $erviana * $erviana;
	$pass_kiri = $user;
	$pass_encrypt = $pass_kiri.encryptFungsi($pass);
	$pass_decrypt = decryptFungsi(substr($pass_encrypt, strlen($pass_kiri),strlen($pass_encrypt)));
	$sql = mysql_query("select * from tb_masuk where username = '$user'") or die (mysql_error());
	$cek = mysql_num_rows($sql);
	if($user == "" || $pass == "" || $nama == "" || $gender == "" || $alamat == "") {
		echo "Tidak boleh ada yang kosong";
	} else if($cek > 0) {
		echo " Username sudah terdaftar, coba nama lain selain ".$user;
	} else {
		$sql_tambah = mysql_query("insert into tb_masuk values ('', '$user', '$pass_encrypt', '$nama', '$alamat', '$gender', 'user')") or die (mysql_error());
		if($sql_tambah) {
			echo "Pendaftaran berhasil";
		} else {
			echo "Pendaftaran Gagal";
		}
	}
}
?>