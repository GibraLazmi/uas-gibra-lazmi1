<?php
// Mengimpor file koneksi database
include('config.php');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Pendaftaran Seni</title>
    <!-- Mengimpor Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Pendaftaran Seni</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">Daftar Pengguna</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Selamat Datang di Pendaftaran Seni</h1>
            <p class="lead">Mari bergabung dalam komunitas seni untuk menampilkan karya terbaik Anda.</p>
            <a href="registration.php" class="btn btn-light btn-lg mt-3">Daftar Sekarang</a>
        </div>
    </header>

    <!-- Section Info -->
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="assets/art.png" alt="Seni Lukis" class="img-fluid mb-3" style="max-width: 150px;">
                <h3>Lukisan</h3>
                <p>Bagikan karya seni lukis Anda kepada dunia.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="assets/music.png" alt="Seni Musik" class="img-fluid mb-3" style="max-width: 150px;">
                <h3>Musik</h3>
                <p>Bergabunglah dalam komunitas musisi berbakat.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="assets/dance.png" alt="Seni Tari" class="img-fluid mb-3" style="max-width: 150px;">
                <h3>Tari</h3>
                <p>Tampilkan gerakan seni tari Anda yang memukau.</p>
            </div>
        </div>
    </section>

    <!-- Section Call-to-Action -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4">Tunggu Apa Lagi?</h2>
            <p class="lead">Bergabunglah sekarang dan tunjukkan bakat seni Anda kepada dunia!</p>
            <a href="registration.php" class="btn btn-primary btn-lg">Mulai Daftar</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 Pendaftaran Seni. Semua hak cipta dilindungi.</p>
    </footer>

    <!-- Mengimpor Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
