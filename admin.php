<?php
session_start();

// Cek jika pengguna sudah login sebagai admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php'); // Arahkan ke halaman login jika belum login atau bukan admin
    exit();
}

// Menyertakan file konfigurasi untuk koneksi database
require_once('config.php');

// Ambil data pendaftaran dari database
$query = "SELECT r.id, r.name, r.age, r.art_category_id, ac.name AS category_name 
          FROM registrationss 
          JOIN art_categories ac ON r.art_category_id = ac.id";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Query gagal: ' . mysqli_error($conn));
}

// Menyimpan data dalam array
$registrations = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Pendaftaran Seni</title>
    <!-- Mengimpor Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Mengimpor Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Admin - Pendaftaran Seni</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="controllers/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Section -->
    <div class="container mt-5">
        <h2 class="mb-4">Data Pendaftaran Seni</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Kategori Seni</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registrations as $registration) { ?>
                <tr>
                    <td><?= $registration['id'] ?></td>
                    <td><?= $registration['name'] ?></td>
                    <td><?= $registration['age'] ?></td>
                    <td><?= $registration['category_name'] ?></td>
                    <td>
                        <a href="controllers/edit.php?id=<?= $registration['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="controllers/delete.php?id=<?= $registration['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Tombol untuk download laporan -->
        <a href="controllers/report.php" class="btn btn-success">Download Laporan</a>
    </div>

    <!-- Mengimpor Bootstrap JS dan Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
