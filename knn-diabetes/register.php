<?php
$username = $_POST['username'];
$password = $_POST['password'];

$dataFile = "user_data.txt";
$alreadyExists = false;

if (file_exists($dataFile)) {
    $lines = file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($savedUser, $savedPass, $savedRole) = explode("|", $line);
        if ($username === $savedUser) {
            $alreadyExists = true;
            break;
        }
    }
}

if ($alreadyExists) {
    echo "<script>
        alert('Username sudah terdaftar!');
        window.location.href = 'register.html';
    </script>";
} else {
    $data = "$username|$password|user\n";
    file_put_contents($dataFile, $data, FILE_APPEND);
    echo "<script>
        alert('Registrasi berhasil, silakan login!');
        window.location.href = 'login.html';
    </script>";
}
?>
