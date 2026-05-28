function hitungDanKonfirmasi() {
    // 1. Ambil nilai luas
    const luasInput = document.getElementById('luasrumah');
    const hargaInput = document.getElementById('harga');
    
    // Pastikan input luas rumah ketemu dan ada isinya
    if (!luasInput || !luasInput.value || luasInput.value <= 0) {
        alert("Silakan masukkan luas ruangan yang valid terlebih dahulu!");
        return;
    }

    const luas = luasInput.value;

    // 2. Hitung harga
    const totalHarga = luas * 10000;

    // 3. Tampilkan ke input harga di layar
    if(hargaInput) {
        hargaInput.value = "Rp " + totalHarga.toLocaleString('id-ID');
    }

    // 4. Munculkan konfirmasi
    const teksKonfirmasi = `Apakah detail pesanan Anda sudah benar?\n\nLuas Ruangan: ${luas} m²\nTotal Harga: Rp ${totalHarga.toLocaleString('id-ID')}`;
    const setuju = confirm(teksKonfirmasi);

    if (setuju) {
        // Jika klik OK, cari form terdekat lalu kirim (submit) secara manual via JS
        document.getElementById('btn-pesan').closest('form').submit();
    } else {
        // Jika klik Cancel, tidak melakukan apa-apa (halaman tidak akan refresh)
        console.log("Pesanan dibatalkan oleh user.");
    }
}