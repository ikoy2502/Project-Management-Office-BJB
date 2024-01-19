// public/js/navigation.js
document.addEventListener('DOMContentLoaded', () => {
    const loading = document.querySelector('.loader');

    // Tampilkan halaman loading saat navigasi dimulai
    const showLoading = () => {
        loading.style.display = 'block';
        loading.style.opacity = 1;
    };

    // Sembunyikan halaman loading setelah konten selesai dimuat
    const hideLoading = () => {
        loading.style.opacity = 0;
        setTimeout(() => {
            loading.style.display = 'none';
        }, 500); // Sesuaikan dengan durasi animasi CSS
    };

    // Tambahkan event listener untuk mengendalikan tampilan halaman loading
    document.addEventListener('beforeunload', showLoading);
    window.addEventListener('load', hideLoading);
});
