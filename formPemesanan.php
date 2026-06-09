<?php

include 'koneksi.php';

// apakah tombol PESAN sudah diklik dan mengirimkan data nama
if (isset($_POST['nama'])) {
    // Ambil data dari input HTML
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomor  = $_POST['nomor']; 
    $luas   = $_POST['luas'];
    $waktu  = $_POST['pilihan'];
    

    $harga_mentah = $_POST['harga'];
    $harga  = preg_replace('/[^0-9]/', '', $harga_mentah); 


    $query = "INSERT INTO pesanan (nama, alamat, no_wa, luas, waktu, harga) 
            VALUES ('$nama', '$alamat', '$nomor', '$luas', '$waktu', '$harga')";
    
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>
                alert('Pesanan Anda berhasil disimpan ke database!');
                window.location='konfirmasi.html';
            </script>";
    } else {
        echo "<script>
                alert('Gagal menyimpan data pesanan: " . mysqli_error($koneksi) . "');
            </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chonburi&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar" style="background-color: #ceddff;">
        <a href="index.html" class="navbar-logo">
            <img src="asset/logo.png" alt="Logo NAN">
        </a>
    </nav>

    <main class="pemesanan-wrapper">

    <div class="pemesanan-kiri">
        <img src="asset/asset pemesanan.png" alt="Ilustrasi Pemesanan" class="img-pemesanan">
    </div>
    <div class="pemesanan-kanan">
        <h1 class="pemesanan-title">PEMESANAN</h1>

    <!-- FORM YANG MASUK KE DATABASE -->
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="kotak-input">
                <label for="nama">NAMA PEMESAN</label>
                <input type="text" name="nama" id="nama" required>
            </div>

            <div class="kotak-input">
                <label for="alamat">ALAMAT RUMAH</label>
                <input type="text" name="alamat" id="alamat" required>
            </div>

            <div class="kotak-input">
                <label for="nowa">NOMOR WHATSAPP</label>
                <input type="text" name="nomor" id="nowa" required>
            </div>

            <div class="kotak-input">
                <label for="luas rumah">LUAS RUANGAN (m<sup>2</sup>) </label>
                <input type="number" name="luas" id="luasrumah"  required>
            </div>
            
            <div class="kotak-input">
                <label for="pilihan">WAKTU PEMBERSIHAN</label>
                <div class="select-wrapper">
                    <select name="pilihan" id="pilihan">
                        <option value="pagi">08.00</option>
                        <option value="siang">13.00</option>
                        <option value="malam">19.00</option>
                    </select>
                </div>
            </div>

            <div class="kotak-input">
                <label for="harga">HARGA</label>
                <input type="text" id="harga" name="harga" readonly placeholder="---">
            </div>

            <p class="info-harga">
                Harga akan otomatis muncul ketika anda telah mengklik tombol dibawah ini!
                Silahkan klik dan konfirmasi sekali lagi.
            </p>
            
            <div class="btn-submit-container">
                <button type="submit" name="action" value="pesan" class="btn-pesan" onclick="hitungDanKonfirmasi()">PESAN</button>
            </div>
        </form>
    </div>
    </main>
    
<script src="script.js"></script>
</body>
</html>