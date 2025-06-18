<?php 
include 'koneksi.php';
//untuk cek jumlah orang yang diinput masuk kategori yang mana, agar tidak terjadi keasalahan input oleh agen

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jumlahPemesan = $_POST['jumlahOrang'] ?? [];
    $jenisPemesan = $_POST['jenis'] ?? [];

    foreach ($jumlahPemesan as $index => $jumlah) {
        $jenis = $jenisPemesan[$index];

        if ($jenis === "Reguler" && $jumlah > 4) {
            echo "<script>
                alert('Jenis Reguler hanya berlaku untuk jumlah orang kurang dari 4. Silakan pilih jenis Promo.');
                window.history.back();
            </script>";
            exit;
        }

        if ($jenis === "Paket" && $jumlah<5) {
            echo "<script>
                alert('Jenis Promo hanya berlaku untuk jumlah orang 5 atau lebih. Silakan pilih jenis Reguler.');
                window.history.back();
            </script>";
            exit;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Ambil data pemesan dari POST
    $id_booking = $_POST['id_booking']; // Ambil id_booking dari POST

    $redirect = $_GET['redirect'] ?? '../negara/hasil.php'; // Default redirect ke hasil.php

    $namaPemesan = $_POST['namaPemesan'];
    $jumlahOrang = $_POST['jumlahOrang'];
    $jenis = $_POST['jenis'];

    // Perbarui data pemesan
    for ($i = 0; $i < count($namaPemesan); $i++) {
        // Pastikan tipe data sesuai
        $jumlahOrangInt = (int) $jumlahOrang[$i]; // Mengonversi string ke integer
        
        // Alternatif menggunakan intval()
        // $jumlahOrangInt = intval($jumlahOrang[$i]);
        
        if (!empty($namaPemesan[$i]) && is_numeric($jumlahOrang[$i]) && !empty($jenis[$i]) && !empty($id_booking[$i])) {
            $sqlUpdate = "UPDATE bookings SET nama_pemesan = ?, jml_orang = ?, jenis = ? WHERE id_booking = ?";
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bind_param("siss", 
                        $namaPemesan[$i], 
                        $jumlahOrangInt, 
                        $jenis[$i], 
                        $id_booking[$i]); // Pastikan id_booking juga di-bind
            
            if ($stmtUpdate->execute()) {
                echo "Row $i updated successfully.<br>";
            } else {
                echo "Error updating row $i: " . $stmtUpdate->error . "<br>";
            }
        } else {
            echo "Skipping row $i due to missing or empty data.<br>";
        }
    }

    // Setelah berhasil, redirect ke halaman hasil
    echo "Data booking berhasil diperbarui!";
    header("Location: $redirect?status=success"); // Ganti 'halaman_hasil.php' dengan nama file halaman hasil Anda
    exit; // Pastikan untuk keluar setelah redirect

    /* DEBUGGING
    echo "<pre>";
    print_r($_POST['jenis']);
    echo "</pre>";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo "<pre>";
    print_r($_POST['jenis']);
    echo "</pre>";
    exit; */
}
?>