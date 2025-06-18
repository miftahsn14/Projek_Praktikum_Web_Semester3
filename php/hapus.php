<?php
// Pastikan koneksi database sudah dilakukan sebelumnya
include 'koneksi.php'; // Sesuaikan dengan koneksi yang ada di project Anda

// Tangkap ID booking yang dikirimkan melalui URL
$id_booking = $_GET['id_booking'] ?? null; // Memeriksa apakah id_booking ada di URL

$redirect = $_GET['redirect'] ?? '../negara/hasil.php'; // Default redirect ke hasil.php

if ($id_booking) {
    // Query untuk menghapus data berdasarkan id_booking
    $sql = "DELETE FROM bookings WHERE id_booking = ?";
    
    // Menyiapkan statement
    if ($stmt = $conn->prepare($sql)) {
        // Binding parameter dan mengeksekusi query
        $stmt->bind_param("i", $id_booking); // i untuk integer
        if ($stmt->execute()) {
            // Jika berhasil menghapus, redirect ke hasil.php
            header("Location: $redirect?status=success"); // Mengarahkan kembali ke hasil.php
            exit();
        } else {
            echo "Terjadi kesalahan saat menghapus data.";
        }
        $stmt->close();
    }
} else {
    echo "ID booking tidak ditemukan.";
}

$conn->close();
?>
