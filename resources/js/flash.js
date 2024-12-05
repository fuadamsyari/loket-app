document.addEventListener("DOMContentLoaded", () => {
    const flashMessage = document.getElementById("flash-message");
    if (flashMessage) {
        setTimeout(() => {
            flashMessage.style.transition = "opacity 0.5s"; // Tambahkan efek transisi
            flashMessage.style.opacity = "0"; // Atur ke transparan

            // Hapus elemen dari DOM setelah transisi selesai
            setTimeout(() => flashMessage.remove(), 500);
        }, 2000); // 2000ms = 2 detik
    }
});
