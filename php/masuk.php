<?php
if(@$_POST['masuk']) {
	$user = @$_POST['user'];
	$pass = @$_POST['pass'];
	
	if($user == "" &&  $pass == "") {
		echo "Username dan Password kosong";
	}else if($user == "") {
		echo "Username kosong";
	}else if($pass == "") {
		echo "Password kosong";
	}else {
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
		$data_kode_user = mysql_query("select * from tb_masuk where username = '$user'") or die (mysql_error());
		$user_kode = mysql_fetch_array($data_kode_user);
		$erviana = pow($user_kode['kode_user'],2);
		$novia = $erviana * $erviana;
		$pass_kiri = $user;
		$pass_encrypt = $pass_kiri.encryptFungsi($pass);
		$pass_decrypt = decryptFungsi(substr($pass_encrypt, strlen($pass_kiri),strlen($pass_encrypt)));
		$sql = mysql_query("select * from tb_masuk where username = '$user' and password = '$pass_encrypt'") or die (mysql_error());
		$data = mysql_fetch_array($sql);
		$cek = mysql_num_rows($sql);
		if($cek > 0) {
			if($data['level'] == "admin") {
				$ket = "Login Sukses sebagai Admin";
				@$_SESSION['admin'] = $data['kode_user'];
			} else if($data['level'] == "operator") {
				$ket = "Login Sukses sebagai Operator";
				@$_SESSION['operator'] = $data['kode_user'];
			} else if($data['level'] == "user") {
				$ket = "Login Sukses sebagai Pelanggan";
				@$_SESSION['user'] = $data['kode_user'];
			}
		} else {
			$ket = "Login gagal (".$pass_decrypt.")";
		}
	}
}
?>
