<?php

include 'koneksi.php'; // Koneksi ke database

// Ambil data dari form
$id_tour = (int)$_POST['id_tour'];
$nama_pemesan = $_POST['namaPemesan']; // Array nama pemesan
$jml_orang = $_POST['jumlahOrang']; // Array jumlah orang
$jenis = $_POST['jenis']; // Array jenis pemesanan

// Validasi jenis pemesanan
// foreach ($jenis as $item) {
//     if (!in_array($item, ['reguler', 'promo', 'cicilan'])) {
//         die('Jenis pemesanan tidak valid!');
//     }
// }
// echo "<pre>";
// print_r($_POST['jenis']);
// echo "</pre>";
$jenis = array_values($jenis);
// Ambil waktu saat ini
date_default_timezone_set('Asia/Jakarta');
$tgl_pemesanan = date('Y-m-d H:i:s');

// Looping untuk menyimpan data ke database
for ($i = 0; $i < count($nama_pemesan); $i++) {
    $nama = $nama_pemesan[$i];
    $jumlah = (int)$jml_orang[$i];
    $jenis_pemesanan = $jenis[$i];

    // Query insert menggunakan prepared statement
    $query = "INSERT INTO bookings (id_tour, nama_pemesan, jml_orang, jenis, tgl_pemesanan) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isiss", $id_tour, $nama, $jumlah, $jenis_pemesanan, $tgl_pemesanan);

    if (!$stmt->execute()) {
        echo "Gagal menyimpan data untuk $nama: " . $stmt->error . "<br>";
    }
}
// Redirect ke halaman hasil.php setelah data berhasil disimpan
//header("location:../negara/hasil.php"); 
header("Location: ../negara/hasil.php"); 
exit();
//echo "Semua data berhasil disimpan!";
?>
