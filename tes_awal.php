<?php
// Tangani data form jika dikirim
$nama = '';
$email = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>web</title>
    </style>
    <script>
        function validateForm() {
            const nama = document.getElementById('nama').value.trim();
            const email = document.getElementById('email').value.trim();
            const emailRegex = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;

            if (nama === '') {
                alert('Nama tidak boleh kosong.');
                return false;
            }

            if (!emailRegex.test(email)) {
                alert('Format email tidak valid.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Halo, Saya suci</h1>

        <p><strong>Biodata:</strong></p>
        <p>Nama: Sucianti</p>
        <p>Jurusan: Sistem Informasi</p>
        <p>Minat:</p>

        <form method="POST" onsubmit="return validateForm()">
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" value=""><br>
            <input type="email" name="email" id="email" placeholder="Masukkan Email" value=""><br>
            <button type="submit">Kirim</button>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="result">
            <h3>Hasil Input:</h3>
            <p><strong>Nama:</strong> <?= $nama ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
