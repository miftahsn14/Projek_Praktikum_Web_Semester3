<?php
session_start();

// Cek 
if (!isset($_SESSION['username'])) {
    header("location: login.php?pesan=belum_login");
    exit();
}

include "php/koneksi.php"; // Menyambungkan koneksi ke db

// Set zona waktu real time
$waktuCanada = new DateTime("now", new DateTimeZone("America/Toronto"));
$waktuJapan = new DateTime("now", new DateTimeZone("Asia/Tokyo"));
$waktuFrance = new DateTime("now", new DateTimeZone("Europe/Paris"));
$waktuChina = new DateTime("now", new DateTimeZone("Asia/Shanghai"));
$waktuJerman = new DateTime("now", new DateTimeZone("Europe/Berlin"));
$waktuThailand = new DateTime("now", new DateTimeZone("Asia/Bangkok"));

// Cek input pencarian
$search_keyword = '';
if (isset($_GET['search'])) {
    $search_keyword = mysqli_real_escape_string($conn, $_GET['search']);
}

// Query untuk ambil data negara yang dicari
$sql = "SELECT * FROM tours";
if ($search_keyword != '') {
    $sql .= " WHERE country LIKE '%$search_keyword%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="foot.css">
    <!-- BS + BS ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        .btn-black {
            background-color: orange;
            color: white;
        }

        .btn-black:hover {
            background-color: #333333;
            color: white;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);;
        }

        .rincian{
            font-family: 'Lucida Sans';
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-secondary-subtle">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow fixed-top navbar-light bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php"><b>MATRIX TOUR</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <span id="waktuIndonesia" class="time-display me-3">
                    <script>
                        function updateTime() {
                            // Update waktu indo real-time
                            const indonesiaTime = new Date().toLocaleTimeString('en-US', {
                                timeZone: 'Asia/Jakarta'
                            });
                            document.getElementById('waktuIndonesia').innerHTML = 'Waktu Indonesia: ' + indonesiaTime;
                        }
                        setInterval(updateTime, 1000);
                        updateTime();
                    </script>
                </span>

                <!-- SEARCH BAR -->
                <form class="d-flex ms-auto" role="search" action="dashboard.php" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="<?php echo htmlspecialchars($search_keyword); ?>">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                </form><!-- END SEARCH BAR -->

                <ul class="navbar-nav ms-auto">
                        <!-- DROPDOWN -->
                    <li class="nav-item dropdown">
                        <a class="btn btn-secondary dropdown-toggle me-2" href="#" id="menuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-menu-button-fill pe-1"></i>Menu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menuDropdown">
                            <li><a class="dropdown-item" href="dropdown/reguler.php">Reguler</a></li>
                            <li><a class="dropdown-item" href="dropdown/promo.php">Promo</a></li>
                            <li><a class="dropdown-item" href="dropdown/cicilan.php">Cicilan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="negara/hasil.php">History</a></li>
                        </ul>
                        <!-- ASSETS -->
                        <a class="btn btn-black me-2" href="dropdown/asset.php"><i class="bi bi-box"></i> Assets</a>
                        <!-- DASHBOARD -->
                        <a class="btn btn-primary me-2" href="dashboard.php"><i class="bi bi-house pe-1"></i>Dashboard</a>
                    </li>

                    <!-- LOGOUT -->
                    <li class="nav-item">
                        <a class="btn btn-danger me-2" href="login.php"><i class="bi bi-box-arrow-right pe-1"></i>Logout</a>
                    </li>

                </ul>
            </div>
        </div><!-- END CONTAINER -->
    </nav><!-- END NAVBAR -->

    <!-- CAROUSEL -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-wrap="true" data-bs-ride="carousel ">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="gambar/jap.jpg" class="d-block w-100" alt="jepang">
                <div class="carousel-caption d-none d-md-block">
                    <h3><b>Japan</b></h3>
                    <p>Japan is an island nation in East Asia known for its rich cultural heritage, technological advancements, and stunning natural landscapes. </p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="gambar/fran.jpg" class="d-block w-100" alt="prancis">
                <div class="carousel-caption d-none d-md-block">
                    <h3><b>France</b></h3>
                    <p>France, located in Western Europe, is renowned for its art, culture, and history. Known as the "Land of Love" </p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="gambar/alaska.png" class="d-block w-100" alt="canada">
                <div class="carousel-caption d-none d-md-block">
                    <h3><b>Canada</b></h3>
                    <p>Canada, the second-largest country in the world, is known for its vast landscapes, multicultural cities, and friendly people. </p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div><!-- END CAROUSEL -->


    <!-- HASIL PENCARIAN -->
    <div class="container mt-5 mb-3h3">
        <h2 class="mb-4 text-center align-middle rincian"><b>PACKAGES</b></h2>
        <hr class="mb-4">
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $countryId = strtolower($row['country']);  //strtolower supaya ga sensitif sama huruf besar/kecil3
                    // ID berdasar nama negara
                    echo '<div class="col">';
                    echo '    <div class="card">';
                    echo '        <img src="gambar/' . htmlspecialchars($row['country']) . '.jpg" class="card-img-top" alt="' . htmlspecialchars($row['country']) . '">';
                    echo '        <div class="card-body">';

                    // Nama negara dan waktu sejaja3
                    echo '            <div class="d-flex justify-content-between align-items-center">';
                    echo '                <h4 class="card-title">' . htmlspecialchars($row['country']) . '</h4>';
                    echo '                <span id="waktu_' . $countryId . '" class="time-display" style="display: inline-block; margin: 0;"><i class="bi bi-clock"></i> Loading...</span>';
                    echo '            </div>';

                    // Kalender
                    echo '            <div style="display: inline-block; vertical-align: middle; margin-right: 200px;">';
                    echo '                <p style="display: inline-block; margin: 0;"><i class="bi bi-calendar2-check pe-2"></i>' . htmlspecialchars($row['duration']) . ' days</p>';
                    echo '            </div>';

                    // Deskripsi
                    echo '            <p class="card-text">' . htmlspecialchars($row['description']) . '</p>';
                    echo '            <h5 style="color: gray; opacity: 0.7;"><del>IDR ' . number_format($row['original_price'], 0, ',', '.') . '</del></h5>';

                    // Harga
                    echo '            <span class="optional-text" style="color: grey; font-size:14px;"><b>Start from</b></span>';
                    echo '            <div class="price-book">';
                    echo '                <h5>IDR ' . number_format($row['price'], 0, ',', '.') . '</h5>';

                    // ini untuk halaman tujuan berdasarkan ID di tabel tours
                    switch ($row['id_tour']) {
                        case 1:
                            echo '<a href="negara/canada.php" class="btn btn-warning">Book now</a>';
                            break;
                        case 2:
                            echo '<a href="negara/japan.php" class="btn btn-warning">Book now</a>';
                            break;
                        case 3:
                            echo '<a href="negara/france.php" class="btn btn-warning">Book now</a>';
                            break;
                        case 4:
                            echo '<a href="negara/china.php" class="btn btn-warning">Book now</a>';
                            break;
                        case 5:
                            echo '<a href="negara/germany.php" class="btn btn-warning">Book now</a>';
                            break;
                        case 6:
                            echo '<a href="negara/thailand.php" class="btn btn-warning">Book now</a>';
                            break;
                    }

                    echo '            </div>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center" style="font-size: 30px; color: grey; text-align: center; margin-top: 30px;">Not found</p>';
            }
            ?>
        </div>
    </div><!-- END DIV PENCARIAN -->

    <!-- FOOTER -->
    <footer class="footer text-center mt-5">
        <div class="container">
            <h5>Follow Us</h5>
            <div class="social-icons mb-3">
                <a href="https://web.facebook.com/groups/elonmusk1/?_rdc=1&_rdr" class="text-decoration-none"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/instagram/" class="text-decoration-none"><i class="bi bi-instagram"></i></a>
                <a href="https://x.com/finkd" class="text-decoration-none"><i class="bi bi-twitter"></i></a>
            </div>
            <div class="footer-links">
                <a href="aboutus.html" class="text-decoration-none">About Us</a> |
              
                <a href="terms.html" class="text-decoration-none">Terms & Conditions</a> |
                <a href="contact.html" class="text-decoration-none">Contact Us</a>
            </div>
            <p class="mt-3">Copyright &copy; Matrix Tour</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- REAL-TIME -->
    <script>
        function updateTime() {
            const times = {

                'waktu_canada': 'America/Toronto',
                'waktu_japan': 'Asia/Tokyo',
                'waktu_france': 'Europe/Paris',
                'waktu_china': 'Asia/Shanghai',
                'waktu_germany': 'Europe/Berlin',
                'waktu_thailand': 'Asia/Bangkok'
            };

            for (const [id_tour, timezone] of Object.entries(times)) {
                const element = document.getElementById(id_tour);
                if (element) {
                    element.innerHTML = '<i class="bi bi-clock"></i> ' + new Date().toLocaleTimeString('en-US', {
                        timeZone: timezone
                    });
                }
            }
        }
        setInterval(updateTime, 1000);
        updateTime();
    </script>

</body>

</html>

<?php
$conn->close();
?>