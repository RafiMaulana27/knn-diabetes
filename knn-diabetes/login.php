<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$found = false;

// Pengecekan admin dulu
if ($username === 'admin' && $password === '123') {
    $_SESSION['username'] = 'admin';
    $_SESSION['role'] = 'admin';
    $found = true;
} else {
    // Baca file user_data.txt
    if (file_exists("user_data.txt")) {
        $lines = file("user_data.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            list($user, $pass, $role) = explode("|", $line);
            if ($username === $user && $password === $pass) {
                $_SESSION['username'] = $user;
                $_SESSION['role'] = $role;
                $found = true;
                break;
            }
        }
    }
}

if ($found) {
    header("Location: home.php");
    exit();
} else {
    echo "<script>
        alert('Username atau Password salah!');
        window.location.href = 'login.html';
    </script>";
}
?>
