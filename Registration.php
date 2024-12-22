<?php
// Mengimpor file koneksi database
include('config.php');

// Proses form pendaftaran
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    
    // Validasi dan proses gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $gambar = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        
        // Tentukan folder tujuan upload
        $upload_dir = 'uploads/';
        
        // Pastikan folder 'uploads' ada dan memiliki izin yang benar
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);  // Membuat direktori jika belum ada
        }

        $target_file = $upload_dir . basename($gambar);
        
        // Cek ekstensi file gambar
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        $file_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        if (in_array($file_ext, $allowed_ext)) {
            // Cek apakah file sudah ada
            if (file_exists($target_file)) {
                echo "<script>alert('File sudah ada, silakan ganti nama file.');</script>";
            } else {
                // Pindahkan gambar yang diupload
                if (move_uploaded_file($tmp_name, $target_file)) {
                    // Query untuk memasukkan data pendaftaran ke database
                    $sql = "INSERT INTO pendaftaran (nama, email, no_telp, kategori, gambar) 
                            VALUES ('$nama', '$email', '$no_telp', '$kategori', '$gambar')";
                    
                    // Eksekusi query
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Pendaftaran berhasil!'); window.location.href = 'index.php';</script>";
                    } else {
                        echo "<script>alert('Pendaftaran gagal!');</script>";
                    }
                } else {
                    echo "<script>alert('Gagal mengunggah gambar. Pastikan file tidak terlalu besar.');</script>";
                }
            }
        } else {
            echo "<script>alert('Ekstensi file tidak diizinkan. Hanya gambar JPG, JPEG, PNG, dan GIF yang diterima.');</script>";
        }
    } else {
        echo "<script>alert('Pilih gambar terlebih dahulu.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Seni</title>
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
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Form Pendaftaran -->
    <section class="container mt-5">
        <h2 class="text-center mb-4">Form Pendaftaran Seni</h2>
        <form action="registration.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="no_telp" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kategori" class="form-label">Kategori Seni</label>
                    <select class="form-select" id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Lukisan">Lukisan</option>
                        <option value="Musik">Musik</option>
                        <option value="Tari">Tari</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="gambar" class="form-label">Foto Karya Seni</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p>&copy; 2024 Pendaftaran Seni. Semua hak cipta dilindungi.</p>
    </footer>

    <!-- Mengimpor Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
