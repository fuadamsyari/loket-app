import "./bootstrap";

// Elemen yang ingin di-scroll
const scrollContainer = document.getElementById("scroll-kontent");

// Saat halaman di-refresh, set posisi scroll kembali
window.addEventListener("load", () => {
    const scrollPosition = localStorage.getItem("scrollPosition");
    if (scrollPosition) {
        scrollContainer.scrollTop = scrollPosition;
    }
});

// Simpan posisi scroll setiap kali pengguna menggulir
scrollContainer.addEventListener("scroll", () => {
    localStorage.setItem("scrollPosition", scrollContainer.scrollTop);
});
function showLoading() {
    const spinner = document.getElementById("loading-spinner");
    if (spinner) {
        spinner.classList.remove("hidden");
    }
}
