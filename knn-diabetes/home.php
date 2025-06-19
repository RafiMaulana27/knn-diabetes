<?php
session_start();

// Redirect jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$role = $_SESSION['role'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Beranda - Prediksi Diabetes</title>
    <style>
        .sidebar {
            width: 230px;
            background-color: #1e3a5f;
            color: white;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar h2 {
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #2c5c88;
        }

        .sidebar .user {
            font-size: 14px;
            opacity: 0.8;
            margin-top: 20px;
            text-align: center;
        }

        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(135deg, #1565c0, #64b5f6);
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 60px;
        }

        .banner-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .banner-image {
            max-width: 600px;
            width: 90%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .menu-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            max-width: 900px;
            width: 90%;
            padding: 20px;
        }

        .menu-item {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(8px);
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
        }

        .menu-item a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }

        footer {
            margin-top: auto;
            padding: 20px;
            font-size: 14px;
            opacity: 0.7;
        }

        .logout-container {
            position: absolute;
            top: 20px;
            right: 30px;
        }

        .logout-button {
            padding: 10px 20px;
            background-color: #d32f2f;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout-button:hover {
            background-color: #b71c1c;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

    <div class="banner-container">
        <img src="images/diabetes_banner.jpg" alt="Gambar Diabetes" class="banner-image">
    </div>

    <h1>Selamat Datang, <?= htmlspecialchars($username) ?>!</h1>
    <p>Sistem Prediksi Risiko Diabetes Berbasis Website</p>

    <div class="menu-container">
        <div class="menu-item"><a href="index.php">Konsultasi</a></div>
        <div class="menu-item"><a href="petunjuk.html">Petunjuk</a></div>
        <div class="menu-item"><a href="pengembangan.php">Pengembangan</a></div>
        <div class="menu-item"><a href="about.html">Tentang Sistem</a></div>

        <?php if ($role === 'admin'): ?>
            <div class="menu-item"><a href="data.html">Data Training</a></div>
        <?php endif; ?>

        <div class="menu-item"><a href="pengembang.html">Halaman Pengembang</a></div>
    </div>

    <div id="sidebar-container"></div>

    <footer>
        &copy; 2025 - Sistem Prediksi Diabetes | Dafa Maulana Rachim - Fauzul Wastha Pramudya - Rafi Maulana Rachman
    </footer>

    <script>
        fetch('sidebar.php')
            .then(res => res.text())
            .then(data => {
                document.getElementById('sidebar-container').innerHTML = data;
            });
    </script>
</body>
</html>
