<?php
$berita_json = file_get_contents('beritateknologi.json');
$berita_data = json_decode($berita_json, true);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suara Publik Digital</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="header-logo">
            <center>
                <img src="foto/SuaraPublikDigtal.png" alt="Logo Suara Publik Digital">
            </center>
        </div>
        <ul class="dropdownlogo">
            <li class="dropdownli">
                <img class="akun" src="foto/anonim.png" alt="User Avatar">
                <div class="dropdown-content">
                    <a href="login.php">Login</a>
                    <a href="register.php">Daftar</a>
                    <a href="register.php">Daftar sebagai Penulis</a>
                </div>
            </li>
        </ul>
        <nav>
            <ul>
                <li><a href="index.php">Suara Terkini</a></li>
                <li><a href="suaranasional.php">Suara Nasional</a></li>
                <li><a href="suarainternasional.php">Suara Internasional</a></li>
                <li><a class="tanda" href="suarateknologi.php">Suara Teknologi</a></li>
                <li><a href="hubungi.php">Sosial Media Kami</a></li>
            </ul>
        </nav>
    </header>

    <section class="articles-container">
        <?php foreach ($berita_data as $berita): ?>
            <article class="news-sendiri">
                <!-- Menampilkan gambar berita -->
                <pre style="white-space: pre-wrap;">
                    <h1>
                        <center>
                        <?php echo $berita['judul'] ?>
                        </center>
                    </h1>
                    <img src="<?php echo $berita['gambar']; ?>" alt="<?php echo $berita['judul']; ?>" />
                    <?php foreach ($berita['konten'] as $paragraf): ?>
                        <p><?php echo $paragraf; ?></p>
                    <?php endforeach; ?>
                    <p><?php echo $berita['penulis']; ?></p>
                </pre>
            </article>
        <?php endforeach; ?>
    </section>



    <footer>
        <p>&copy; 2024 Suara Publik Digital. Semua hak milik SuaraPublikDigital.</p>
    </footer>
</body>

</html>