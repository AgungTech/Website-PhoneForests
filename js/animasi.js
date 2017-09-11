$(document).ready(function(){
	$('#registrasi').click(function(){
	    $('#dialog_registrasi').fadeIn(function() {
	        $('#nama').slideDown("fast", function() {
		        $('#user').slideDown("fast", function() {
			        $('#gender').slideDown("fast", function() {
				        $('#alamat').slideDown("fast", function() {
					        $('#password').slideDown("fast", function() {
						        $('#tombol_registrasi').slideDown("fast");
							});
						});
					});
				});
		    });
	    });
	});
	$('#masuk').click(function(){
	    $('#dialog_masuk').fadeIn(function() {
	        $('#username').slideDown("fast", function() {
		        $('#pass').slideDown("fast", function() {
					$('#tombol_masuk').slideDown("fast");
				});
		    });
	    });
	});
	$('#tambah').click(function(){
	    $('#dialog_tambah').slideToggle("slow");
	});
	$('#tutup').click(function(){
	    $('#dialog_registrasi').fadeOut();
	    $('#nama').fadeOut();
	    $('#user').fadeOut();
	    $('#gender').fadeOut();
	    $('#alamat').fadeOut();
	    $('#password').fadeOut();
	    $('#tombol_registrasi').fadeOut();
	});
	$('#tutup_m').click(function(){
	    $('#dialog_masuk').fadeOut();
	    $('#username').fadeOut();
	    $('#pass').fadeOut();
	    $('#tombol_masuk').fadeOut();
	});
	$('.tema').click(function(){
	    $('#dialog_tema').fadeToggle();
        $("html, body").animate({scrollTop: 0}, 600);
	});
	$('#tema_standar').click(function(){
	    $('#dialog_tema').fadeToggle();
	});
	$('#tema_windows').click(function(){
	    $('#dialog_tema').fadeToggle();
	});
	$('.print').click(function(){
	    $('#dialog_print').fadeToggle();
	});
	$('#tutup_print').click(function(){
	    $('#dialog_print').fadeToggle();
	});
	$('.sms').click(function(){
	    $('#dialog_pesan').fadeIn(function() {
	        $('#dialog_pesan .isi').fadeIn(1000, function() {
		        $("#dialog_pesan .isi, .percakapan").animate({scrollTop: $('.percakapan').prop("scrollHeight")}, 1000);
	        });
	    });
	});
	$('[fungsi="tombol_detail"]').click(function(){
	    $('#detail').fadeIn(3000, function() {
	        $('.status').slideDown(1000);	
	    });
	});
	$('[fungsi="tutup_detail"]').click(function(){
	    $('#detail').fadeOut();
        $('.status').slideUp();
	});
    $('#tutup_sms').click(function(){
	    $('#dialog_pesan .isi').slideUp(function() {
		    $('#dialog_pesan').fadeOut();
		});
	});
	$('.cari_ponsel').click(function(){
	    $('.pencarian').fadeToggle();
        $("html, #dialog_cari").animate({scrollTop: $('#dialog_cari').offset().top}, 600);
	});
   	$(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.ke_atas').slideDown("slow", function() {
				$('[title="Ke Atas"]').slideDown();
		    });
        } else {
            $('.ke_atas').fadeOut("slow", function() {
				$('[title="Ke Atas"]').slideUp();
		    });
        }
    });
         if ($(this).scrollTop() > 50) {
            $('.ke_atas').slideDown("slow", function() {
				$('[title="Ke Atas"]').slideDown();
		    });
        } else {
            $('.ke_atas').fadeOut("slow", function() {
				$('[title="Ke Atas"]').slideUp();
		    });
        }
   $('.ke_atas').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
	$("#tb_kelola_barang").tablesorter( {sortList: [[0,0], [1,0]]} );
	$('body').jScrollPane();
});

function reloadOtomatis(){
	$(".percakapan").load("php/percakapan.php");
	$("#dialog_pesan .isi, .percakapan").animate({scrollTop: $('.percakapan').prop("scrollHeight")}, 1000);
}
setInterval(function(){reloadOtomatis()}, 5000);
setInterval(function(){$('.status').fadeOut(1000)}, 7000);

function zeroPad(num, places) {
  var zero = places - num.toString().length + 1;
  return Array(+(zero > 0 && zero)).join("0") + num;
}
function waktuUpdate(){
	pukul = new Date();
	jm = pukul.getHours();
	if(jm<10) {
		jam = '0'+pukul.getHours();
	} else {
		jam = pukul.getHours();
	}
	mnt = pukul.getMinutes();
	if(mnt<10) {
		menit = '0'+pukul.getMinutes();
	} else {
		menit = pukul.getMinutes();
	}
	dtk = pukul.getSeconds();
	if(dtk<10) {
		detik = '0'+pukul.getSeconds();
	} else {
		detik = pukul.getSeconds();
	}
	milidetik = pukul.getMilliseconds()*pukul.getMilliseconds();
	waktu = jam+':'+menit+':'+detik+'.'+zeroPad(milidetik, 6);
	setTimeout("waktuUpdate()", 100);
	document.getElementById('waktu').innerHTML = waktu;
}
waktuUpdate(); // Memanggil
