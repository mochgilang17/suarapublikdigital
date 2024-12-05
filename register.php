<?php
if (isset($_POST['submit'])) {
    $file = 'data_login.json';
    $data = [];

    // Membaca file JSON jika ada
    if (file_exists($file)) {
        $json_data = file_get_contents($file);
        $data = json_decode($json_data, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            die("Format JSON tidak valid: " . json_last_error_msg());
        }
    }

    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Cek apakah username sudah ada
    foreach ($data as $user) {
        if ($user['username'] === $username) {
            echo "<script>alert('Username sudah terdaftar!'); window.history.back();</script>";
            exit;
        }
    }

    // Tambah data baru
    $new_user = [
        "username" => $username,
        "password" => $password // Tidak aman, hanya untuk implementasi sederhana
    ];
    $data[] = $new_user;

    // Simpan ke file JSON
    if (file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT))) {
        echo "<script>alert('kamu berhasil mendaftar! Silakan login.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!'); window.history.back();</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <header>
        <h1>SuaraPublikDigital</h1>
    </header>
    <main>
        <form method="POST" action="">
            <div>
                <center>
                    <img class="logo" src="foto/SuaraPublikDigtal.png" alt="Logo SuaraPublikDigital">
                </center>
            </div>
            <div class="container">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Masukkan Username" name="username" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Masukkan Password" name="password" required>

                <button name="submit" type="submit">Daftar</button>
            </div>
        </form>
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">
                <a class="tombol-cancel" href="index.php">Kembali</a>
            </button>
        </div>
    </main>
    <footer>
        <center>
            <p>&copy; 2024 Suara Publik Digital. Semua hak milik SuaraPublikDigital.</p>
        </center>
    </footer>
</body>

</html>