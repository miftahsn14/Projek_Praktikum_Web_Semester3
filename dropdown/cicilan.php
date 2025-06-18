<?php 
session_start();
if(empty($_SESSION['username'])){
    header("location:../login.php?pesan=belum_login");
}

include '../php/koneksi.php';

// Query untuk mengambil data dari bookings
$sql_booking = "SELECT * 
FROM bookings b 
JOIN tours t ON b.id_tour = t.id_tour 
WHERE jenis = 'Cicilan';";
$result_booking = mysqli_query($conn, $sql_booking);

// Query untuk menjumlahkan total keuntungan
$sql_sum = "SELECT SUM(keuntungan) AS total_keuntungan 
FROM bookings 
WHERE jenis = 'Cicilan'";
$result_sum = mysqli_query($conn, $sql_sum);

//Ambil hasilnya
$total_keuntungan = 0;
if ($result_sum) {
    $row_sum = mysqli_fetch_assoc($result_sum);
    $total_keuntungan = $row_sum['total_keuntungan'] ?? 0;
} else {
    echo "Error: " . mysqli_error($conn);
}

  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Cicilan</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../foot.css">
    <link rel="stylesheet" href="drop.css">

    <style>
        
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow fixed-top navbar-light bg-transparent">
        <div class="container">
            <a class="btn btn-outline-danger me-3" href="javascript:history.back()">
                <i class="bi bi-arrow-left"></i> Back
            </a>
            <a class="navbar-brand" href="#"><b>Data Cicilan
            </b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <span id="waktuIndonesia" class="time-display me-3">
                    <script>
                        function updateTime() {
                            const indonesiaTime = new Date().toLocaleTimeString('en-US', {
                                timeZone: 'Asia/Jakarta'
                            });
                            document.getElementById('waktuIndonesia').innerHTML = 'Waktu Indonesia: ' + indonesiaTime;
                        }
                        setInterval(updateTime, 1000);
                        updateTime();
                    </script>
                </span>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="btn btn-secondary dropdown-toggle me-2" href="#" id="menuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-menu-button-fill pe-1"></i>Menu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menuDropdown">
                            <li><a class="dropdown-item" href="reguler.php">Reguler</a></li>
                            <li><a class="dropdown-item" href="promo.php">Promo</a></li>
                            <li><a class="dropdown-item" href="cicilan.php">Cicilan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../negara/hasil.php">History</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-black me-2" href="asset.php"><i class="bi bi-box"></i> Assets</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary me-2" href="../dashboard.php"><i class="bi bi-house"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger me-2" href="../login.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="content">
        <div class="table-responsive table-custom">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Negara</th>
                        <th>Action</th>
                        <th>Keuntungan</th>
                    </tr>
                </thead>

                <!-- Syntax php untuk memunculkan data -->
                <?php 
                $nomor = 1; //inisialisai no di tabel
                while($row_booking = mysqli_fetch_array($result_booking)){ ?>
                    <tbody>
                        <tr>
                            <!-- NO -->
                            <td class="text-center align-middle"><?php echo $nomor++; ?></td>

                            <!-- NAMA PEMESAN -->
                            <td class="text-center align-middle"><?php echo $row_booking['nama_pemesan']; ?></td>

                            <!-- NEGARA -->
                            <td class="text-center align-middle"><?php echo $row_booking['country']; ?></td>

                            <!-- ACTION -->
                            <td>
                                <!-- DETAILS -->
                                <a href="../php/rincian.php?id_booking=<?php echo $row_booking['id_booking']; ?>" class="btn btn-info action-btn" title="Details">
                                    <i class="bi bi-info-circle-fill"></i> Details
                                </a>

                                <!-- EDIT -->
                                <a href="../php/edit.php?id_booking=<?php echo $row_booking['id_booking']; ?>&redirect=../dropdown/cicilan.php" class="btn btn-primary action-btn" title="Edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <!-- DELETE -->
                                <a href="../php/hapus.php?id_booking=<?php echo $row_booking['id_booking']; ?>&redirect=../dropdown/cicilan.php" class="btn btn-danger action-btn" title="Delete">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </a>
                            </td>
                            
                            <!-- KEUNTUNGAN -->
                            <td class="text-center align-middle"><?php echo number_format($row_booking['keuntungan'], 0, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                    <?php 
                    } ?>

                    <!-- TOTAL KEUNTUNGAN -->
                    <tr>
                            <td colspan="4" class="text-start"><b>Total Keuntungan</b></td>
                            <td class="text-success font-weight-bold"><?php echo number_format($total_keuntungan, 0, ',', '.'); ?></td>
                        </tr>
            </table>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer mt-5">
        <div class="container">
            <h5>Follow Us</h5>
            <div class="social-icons mb-3">
                <a href="https://web.facebook.com/groups/elonmusk1/?_rdc=1&_rdr" class="text-decoration-none"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/instagram/" class="text-decoration-none"><i class="bi bi-instagram"></i></a>
                <a href="https://x.com/finkd" class="text-decoration-none"><i class="bi bi-twitter"></i></a>
            </div>
            <div class="footer-links">
                <a href="../us.html" class="text-decoration-none">Tentang Kami</a> |
                <a href="../karir.html" class="text-decoration-none">Karir</a> |
                <a href="../syarat.html" class="text-decoration-none">Syarat & Ketentuan</a> |
                <a href="../hub.html" class="text-decoration-none">Hubungi Kami</a>
            </div>
            <p class="mt-3">Copyright &copy; Matrix Tour</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
