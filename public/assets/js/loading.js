// Tampilkan loading page saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
    document.body.style.overflow = "hidden"; // Hindari scroll selama loading
    document.getElementById("loading-page").style.display = "block";
});

// Sembunyikan loading page setelah halaman selesai dimuat
window.addEventListener("load", function () {
    setTimeout(function () {
        document.body.style.overflow = "auto"; // Aktifkan scroll setelah loading
        document.getElementById("loading-page").style.display = "none";
    }, 1000); // Sesuaikan waktu yang sesuai dengan kebutuhan Anda
});
