<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:loginluar.php?pesan=belum_login");
}

include '../php/koneksi.php';

// Ambil id_tour dari URL
$id_tour = isset($_GET['id_tour']) ? $_GET['id_tour'] : 0; // default ke 0 jika tidak ada parameter

//mengambil data dari bookings
$sql = "SELECT * 
FROM bookings b 
JOIN tours t ON b.id_tour = t.id_tour;";
$result = mysqli_query($conn, $sql);
//ORDER BY t.country ASC

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../foot.css">


    <style>
        .navbar {

            position: fixed;
            /* Tetap di bagian atas saat scroll */
            width: 100%;
            /* Lebar penuh */
            z-index: 10;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Tambahkan bayangan bawah */
        }


        /* Untuk memastikan layout penuh */
        html,
        body {
            height: 100%;
            /* Tinggi penuh untuk Flexbox */
            margin: 0;
            /* Hilangkan margin default */
            display: flex;
            flex-direction: column;
            padding-top: 50px;
        }

        .content {
            flex: 1;
            /* Ambil semua ruang yang tersedia sebelum footer */
        }

        .footer {
            background-color: #f8f9fa;
            /* Warna footer */
            padding: 10px 0;
            text-align: center;
        }

        .table-custom {
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        .table-custom thead th {
            background: linear-gradient(45deg, #4169e1, #6a9df2);
            color: white;
            text-align: center;
            font-weight: 600;
            padding: 15px;
        }

        .table-custom tbody td,
        .table-custom tbody th {
            padding: 12px;
            color: #333;
            vertical-align: middle;
            border-top: 1px solid #ddd;
        }

        .table-custom tbody tr:hover {
            background-color: #eaf3ff;
            cursor: pointer;
        }

        .action-btn {
            margin: 0 5px;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .btn-info {
            background-color: #5bc0de;
            color: white;
            border: none;
        }

        .btn-info:hover {
            background-color: #31b0d5;
        }


        .btn-black {
            background-color: orange;
            color: white;
        }

        .btn-black:hover {
            background-color: #333333;
            /* Slightly lighter shade for hover effect */
            color: white;
        }

        .rincian{
            font-family: 'Lucida Sans';
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow fixed-top navbar-light bg-transparent">
        <div class="container">
            <!-- Back Button -->
            <a class="btn btn-outline-danger me-3" href="javascript:history.back()">
                <i class="bi bi-arrow-left"></i> Back
            </a>

            <!-- Brand Name -->
            <a class="navbar-brand" href="hasil.php"><b>Result</b></a>

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
                            <li><a class="dropdown-item" href="../dropdown/reguler.php">Reguler</a></li>
                            <li><a class="dropdown-item" href="../dropdown/promo.php">Promo</a></li>
                            <li><a class="dropdown-item" href="../dropdown/cicilan.php">Cicilan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="hasil.php">History</a></li>

                        </ul>

                        <a class="btn btn-black me-2" href="../dropdown/asset.php"><i class="bi bi-box pe-1"></i>Assets</a>
                        <a class="btn btn-primary me-2" href="../dashboard.php"><i class="bi bi-house pe-1"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger me-2" href="../login.php"><i class="bi bi-box-arrow-right pe-1"></i>Logout</a>
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
                        <th>Nama Pemesan</th>
                        <th>Jumlah Orang</th>
                        <th>Jenis</th>
                        <th>Negara</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <!-- Syntax php untuk memunculkan data -->
                <?php
                $nomor = 1; // Inisialisai no di tabel
                while($row = mysqli_fetch_array($result)){
                ?>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle"><?php echo $nomor++; ?></td>
                            <td class="text-center align-middle"><?php echo $row['nama_pemesan']; ?></td>
                            <td class="text-center align-middle"><?php echo $row['jml_orang']; ?></td>
                            <td class="text-center align-middle"><?php echo $row['jenis']; ?></td>
                            <td class="text-center align-middle"><?php echo $row['country']; ?></td>

                            <!-- ACTION -->
                            <td>
                                <!-- DETAILS -->
                                <a href="../php/rincian.php?id_booking=<?php echo $row['id_booking']; ?>" class="btn btn-info action-btn" title="Details">
                                    <i class="fas fa-info-circle"></i> Details
                                </a>

                                <!-- EDIT -->
                                <a href="../php/edit.php?id_booking=<?php echo $row['id_booking']; ?>" class="btn btn-primary action-btn" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <!-- DELETE -->
                                <a href="../php/hapus.php?id_booking=<?php echo $row['id_booking']; ?>" class="btn btn-danger action-btn" title="Delete">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>

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

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>