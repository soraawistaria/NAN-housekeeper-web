<?php
// Panggil file koneksi database
include 'koneksi.php';

// Memulai fungsi session untuk menandai bahwa user sudah login
session_start();

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencocokkan username dan password yang diinput dengan yang ada di database
    $query  = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    // Jika baris data ditemukan (artinya username & password cocok)
    if (mysqli_num_rows($result) === 1) {
        $data_user = mysqli_fetch_assoc($result);
        
        // Simpan data login pengguna ke dalam session browser
        $_SESSION['login']    = true;
        $_SESSION['id_user']  = $data_user['id_user'];
        $_SESSION['username'] = $data_user['username'];

        echo "<script>
                alert('Selamat Datang, " . $_SESSION['username'] . "!');
                window.location='index.html'; 
            </script>";
    } else {
        // Jika tidak cocok
        echo "<script>
                alert('Username atau Password salah!');
                window.location='masuk.php';
            </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title> 
    <!-- stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chonburi&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <a href="index.html">Beranda</a>
        <a href="profile.html">Profil</a>
        <a href="#">Masuk</a>
        <a href="daftar.php">Daftar</a>
        <a href="formPemesanan.php">Pemesanan</a>
    </nav>

    <main class="main-content">
        <div class="login">
            <h1 class="main-title">MASUK</h1>

            <img src="asset/asset masuk.png" class="illustration">

            <div class="login-box">
                <form id="loginForm" method="POST">
                    <input type="text" id="user" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </form>
            </div>

            <button type="submit" form="loginForm" class="btn">MASUK</button>
        </div>
    </main>
</body>
</html>