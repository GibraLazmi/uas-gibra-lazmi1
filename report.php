<?php
// Download CSV report
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=laporan_pendaftaran.csv');

$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Nama', 'Usia', 'Kategori Seni']);
$registrations = Registration::getAll();

foreach ($registrations as $registration) {
    fputcsv($output, $registration);
}

fclose($output);
?>
