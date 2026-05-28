function hitungDanKonfirmasi(event) {
    const luas = document.getElementById('luasrumah').value;
    
    if (!luas || luas <= 0) {
        alert("Silakan masukkan luas ruangan yang valid terlebih dahulu!");
        return false;
    }

    const hargaPerMeter = 10000;
    const totalHarga = luas * hargaPerMeter;

    // Tampilkan ke input harga di layar
    document.getElementById('harga').value = "Rp " + totalHarga.toLocaleString('id-ID');

    // Munculkan konfirmasi
    const teksKonfirmasi = `Apakah detail pesanan Anda sudah benar?\n\nLuas Ruangan: ${luas} m²\nTotal Harga: Rp ${totalHarga.toLocaleString('id-ID')}`;
    const setuju = confirm(teksKonfirmasi);

    if (setuju) {
        // Jika OK, form akan dikirim ke server Laragon
        return true; 
    } else {
        // Jika Cancel, pengiriman digagalkan
        event.preventDefault(); 
        return false;
    }
}