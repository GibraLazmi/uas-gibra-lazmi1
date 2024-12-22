<?php
// Menyertakan file konfigurasi untuk koneksi database
require_once('config.php');

// Ambil data pendaftaran dari database
$query = "SELECT r.id, r.name, r.age, r.art_category_id, ac.name AS category_name 
          FROM registrations r 
          JOIN art_categories ac ON r.art_category_id = ac.id";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Query gagal: ' . mysqli_error($conn));
}

// Menyimpan data dalam array
$registrations = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<table class="table">
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
            <td><?= $registration['category_name'] ?></td> <!-- Menggunakan category_name dari join -->
            <td>
                <a href="controllers/edit.php?id=<?= $registration['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="controllers/delete.php?id=<?= $registration['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<a href="controllers/report.php" class="btn btn-success">Download Laporan</a>
