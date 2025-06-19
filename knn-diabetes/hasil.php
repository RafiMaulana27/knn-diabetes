<?php
// Ambil data input dari user
$nama = $_POST['nama'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$usia = $_POST['usia'];
$glukosa = $_POST['glukosa'];
$tekanan = $_POST['tekanan'];
$bmi = $_POST['bmi'];
$riwayat = $_POST['riwayat'];
$poliuria = $_POST['poliuria'];
$polidipsia = $_POST['polidipsia'];
$polifagia = $_POST['polifagia'];

// Data input user (fitur)
$input = [$glukosa, $tekanan, $bmi, $usia, $riwayat, $poliuria, $polidipsia, $polifagia];

// Data training dummy (fitur + kelas)
$data_training = [
    [[140, 90, 32, 45, 5, 5, 3, 3], "Tinggi"],
    [[110, 80, 24, 30, 1, 1, 1, 1], "Rendah"],
    [[130, 85, 28, 40, 3, 3, 3, 3], "Sedang"],
    [[160, 100, 35, 55, 5, 5, 5, 5], "Tinggi"],
    [[115, 75, 26, 32, 3, 3, 1, 1], "Sedang"],
    [[100, 78, 22, 25, 1, 1, 1, 1], "Rendah"]
];

// Fungsi hitung Euclidean distance
function euclidean_distance($a, $b) {
    $sum = 0;
    for ($i = 0; $i < count($a); $i++) {
        $sum += pow($a[$i] - $b[$i], 2);
    }
    return sqrt($sum);
}

// Hitung semua jarak
$jarak = [];
foreach ($data_training as $data) {
    $jarak[] = [
        'jarak' => euclidean_distance($input, $data[0]),
        'kelas' => $data[1]
    ];
}

// Urutkan berdasarkan jarak terdekat
usort($jarak, function ($a, $b) {
    return $a['jarak'] <=> $b['jarak'];
});

// Ambil 3 data terdekat
$k = 3;
$vote = [];
for ($i = 0; $i < $k; $i++) {
    $kelas = $jarak[$i]['kelas'];
    if (!isset($vote[$kelas])) {
        $vote[$kelas] = 0;
    }
    $vote[$kelas]++;
}

// Cari kelas mayoritas
arsort($vote);
$hasil = array_key_first($vote);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Prediksi (K-NN)</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #e3f2fd;
            padding: 40px;
            color: #0d47a1;
        }

        .result-container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #1565c0;
            margin-bottom: 20px;
        }

        p {
            font-size: 17px;
            line-height: 1.7;
        }

        .hasil {
            font-size: 20px;
            font-weight: bold;
            color: #d32f2f;
            margin-top: 20px;
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
    <div class="result-container">
        <h2>Hasil Prediksi Risiko Diabetes</h2>

        <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
        <p><strong>Pekerjaan:</strong> <?= htmlspecialchars($pekerjaan) ?></p>
        <p><strong>Alamat:</strong> <?= htmlspecialchars($alamat) ?></p>
        <p><strong>Usia:</strong> <?= $usia ?> tahun</p>
        <p><strong>Glukosa:</strong> <?= $glukosa ?> mg/dL</p>
        <p><strong>Tekanan Darah:</strong> <?= $tekanan ?> mmHg</p>
        <p><strong>BMI:</strong> <?= $bmi ?></p>
        <p><strong>Riwayat Keluarga:</strong> Bobot <?= $riwayat ?></p>
        <p><strong>Poliuria:</strong> Bobot <?= $poliuria ?></p>
        <p><strong>Polidipsia:</strong> Bobot <?= $polidipsia ?></p>
        <p><strong>Polifagia:</strong> Bobot <?= $polifagia ?></p>

        <p class="hasil">🔍 Prediksi Risiko: <?= $hasil ?></p>

        <a href="index.php">← Konsultasi Ulang</a>
    </div>
</body>
</html>
