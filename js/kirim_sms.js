$(function() {
	$("#klik_sms").click(function() {
		smsku = $("#isi_sms").val();
		tanggal = $("#tanggal_sekarang2").val();
		waktu = $("#waktu").val();
		user = $("#user_aktif").val();
		isi_pesan = 'isi_sms='+smsku+'&tanggal='+tanggal+'&jam='+waktu+'&user='+user;
		if(smsku=='') {
			alert("Pesan harus diisi...");
			$("#isi_sms").focus();
		} else {
			$.ajax({
				type: "POST",
				url: "php/percakapan_update.php",
				data: isi_pesan,
				cache: true,
				success: function(html){
					$(".percakapan").load("php/percakapan.php");
					document.getElementById('isi_sms').value='';
					$("#dialog_pesan .isi, .percakapan").animate({scrollTop: $('.percakapan').prop("scrollHeight")}, 1000);
				}
			});
		}
		return false;
	});
});
