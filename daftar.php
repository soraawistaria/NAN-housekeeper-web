<?php
// Panggil file koneksi database
include 'koneksi.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Disimpan dalam bentuk teks biasa untuk keperluan tugas/belajar

    // Validasi agar input tidak kosong
    if (!empty($username) && !empty($password)) {
        
        // Query untuk memasukkan data ke tabel users
        // id_user tidak perlu diisi karena otomatis (Auto Increment)
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $simpan = mysqli_query($koneksi, $query);

        if ($simpan) {
            echo "<script>
                    alert('Pendaftaran berhasil! Silakan masuk.');
                    window.location='masuk.php';
                </script>";
        } else {
            echo "<script>
                    alert('Gagal mendaftar: " . mysqli_error($koneksi) . "');
                </script>";
        }
    } else {
        echo "<script>alert('Username dan Password tidak boleh kosong!');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chonburi&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar">
        <a href="index.html" class="navbar-logo">
            <img src="asset/logo.png" alt="Logo NAN">
        </a>

        <a href="index.html">Beranda</a>
        <a href="profile.html">Profil</a>
        <a href="masuk.php">Masuk</a>
        <a href="#">Daftar</a>
        <a href="formPemesanan.php">Pemesanan</a>
    </nav>

    <main class="main-content">
        <div class="register">
            <h1 class="main-title">DAFTAR</h1>

            <img src="asset/asset daftar.png" class="illustration">

            <div class="register-box">
                <form id="registerForm" method="POST">
                    <input type="text" id="user" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </form>
            </div>

            <button type="submit" form="registerForm" class="btn">DAFTAR</button>
        </div>
    </main>
</body>
</html>