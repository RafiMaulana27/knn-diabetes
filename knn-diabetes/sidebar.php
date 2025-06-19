<?php
if (!isset($_SESSION)) session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
?>
<div class="sidebar">
    <h2>Dashboard</h2>
    <ul>
        <li><a href="home.php">🏠 Dashboard</a></li>
        <li><a href="pengembang.php">👨‍💻 Pengembang</a></li>
        <li><a href="about.php">ℹ️ Tentang</a></li>

        <?php if ($role === 'admin'): ?>
            <li><a href="data.php">📊 Data Training</a></li>
        <?php endif; ?>

        <li><a href="index.php">📋 Konsultasi</a></li>
    </ul>
    <div class="user">
        <?= ($role === 'admin') ? 'Administrator' : 'User'; ?>
    </div>
</div>
