<?php
if (isset($_POST['submit'])) {
    // Membaca file JSON
    $file = 'data_login.json';
    if (file_exists($file)) {
        $json_data = file_get_contents($file);
        $data = json_decode($json_data, true);

        // Validasi JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            die("Format JSON tidak valid: " . json_last_error_msg());
        }
    } else {
        die("File data_login.json tidak ditemukan.");
    }

    // Validasi apakah data berbentuk array
    if (!is_array($data)) {
        die("Data login tidak valid. Pastikan file JSON berisi array.");
    }

    // Mengambil input dari form
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Proses verifikasi username dan password
    $isValid = false;
    foreach ($data as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $isValid = true;
            break;
        }
    }

    // Hasil verifikasi
    if ($isValid) {
        echo "<script>alert('Login berhasil!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Username atau password salah!'); window.history.back();</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

                <button name="submit" type="submit">Login</button>
            </div>
        </form>
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">
                <a class="tombol-cancel" href="register.php">Daftar</a>
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