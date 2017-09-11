
function dialogMasuk() {
    var x = document.getElementById("dialog_masuk");
    x.style.display = "block"; 
}
function dialogRegistrasi() {
    var x = document.getElementById("dialog_registrasi");
    x.style.display = "block";
}
function dialogTambah() {
    var t = document.getElementById("dialog_tambah");
	t.style.display = "block"; 
}
function dialogUbah() {
    var u = document.getElementById("dialog_ubah");
	u.style.display = "block"; 
}
function dialogTutup() {
    var x = document.getElementById("dialog_registrasi");
    var y = document.getElementById("dialog_masuk");
    var t = document.getElementById("dialog_tambah");
    var u = document.getElementById("dialog_ubah");
    x.style.display = "none"; 
    y.style.display = "none"; 
    t.style.display = "none"; 
    u.style.display = "none"; 
}
