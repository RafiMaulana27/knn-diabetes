<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Pengembangan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #e1f5fe;
            padding: 40px;
            color: #0d47a1;
        }

        .container {
            max-width: 850px;
            margin: auto;
            background-color: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #1565c0;
            margin-bottom: 20px;
        }

        h3 {
            color: #1976d2;
            margin-top: 25px;
        }

        p {
            font-size: 17px;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        ul {
            margin-left: 20px;
            font-size: 16px;
        }

        a {
            display: block;
            margin-top: 30px;
            text-align: center;
            text-decoration: none;
            background-color: #1976d2;
            color: white;
            padding: 10px 25px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            border-radius: 8px;
        }

        a:hover {
            background-color: #0d47a1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Informasi Pengembangan Sistem</h2>

        <h3>Teknologi & Tools</h3>
        <ul>
            <li>Bahasa: HTML, CSS, PHP</li>
            <li>Web Server: XAMPP (Apache + PHP 8+)</li>
            <li>Editor: Visual Studio Code</li>
        </ul>

        <h3>Metode yang Digunakan</h3>
        <p>
            Sistem ini menggunakan metode <strong>K-Nearest Neighbors (K-NN)</strong>, yaitu metode klasifikasi berbasis kedekatan data. 
            Input berupa data kesehatan pengguna dibandingkan dengan data training menggunakan <em>Euclidean Distance</em> untuk menentukan tingkat risiko diabetes.
        </p>

        <h3>Fitur Utama Aplikasi</h3>
        <ul>
            <li>Form input konsultasi risiko diabetes</li>
            <li>Perhitungan klasifikasi berbasis K-NN (versi sederhana)</li>
            <li>Hasil prediksi risiko: Rendah, Sedang, atau Tinggi</li>
            <li>Petunjuk penggunaan, informasi pengembangan, dan data training</li>
        </ul>

        <a href="home.php">Kembali ke Beranda</a>
    </div>
</body>
</html>
