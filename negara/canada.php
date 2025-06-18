<!-- bingung di line 303 itu yg bener value diisi 1 karena canada atau diisi echo $id_tour kyk gitu mitt, kyk ada 2 referensi cm blm clear penggunaannya -->
<!-- <?php
//session_start();

//include '../php/koneksi.php'; // Koneksi ke database

// Nama negara yang ingin dicari
//$id_tour = 1;

// Query untuk mendapatkan id_tour berdasarkan country
//$sql = "SELECT id_tour FROM tours WHERE country = 'Canada'";
//$result = mysqli_query($conn, $sql);

//if($result && mysqli_num_rows($result) > 0){
    //$row = mysqli_fetch_assoc($result);
    //$id_tour = $row['id_tour'];
//}else{
    $id_tour = null; 
//}

//mysqli_close($conn);

//?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canada</title>

    <!-- BS + BS ICON  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
    <!-- CSS -->
    <link rel="stylesheet" href="countryy.css">
    <link rel="stylesheet" href="../foot.css">
    <style>
        .hero-section {
            position: relative;
            background: url('../gambar/alaska.png') center/cover no-repeat;
            color: white;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;

        }

        .highlight-section {
            position: relative;
            background-image: url('../gambar/wih.png');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 50px 0;
            width: 100vw;
            margin-left: calc(50% - 50vw);
            box-shadow: 0px -4px 10px rgba(0, 0, 0, 0.1);

        }

        .footer {
            width: 100vw;
            margin-left: calc(50% - 50vw);

        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;

        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow fixed-top navbar-light bg-transparent">
        <div class="container">
            <!-- BACK -->
            <a class="btn btn-outline-danger me-3" href="../dashboard.php">
                <i class="bi bi-arrow-left me-1"></i>Back
            </a>

            <!-- Brand Name -->
            <a class="navbar-brand" href="../dashboard.php"><b>MATRIX TOUR</b></a>

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

                <ul class="navbar-nav ms-auto">
                    <!-- DROPDOWN -->
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

                        <!-- ASSETS -->
                        <a class="btn btn-black me-2" href="../dropdown/asset.php"><i class="bi bi-box pe-1"></i>Assets</a>

                        <!-- DASHBOARD -->
                        <a class="btn btn-primary me-2" href="../dashboard.php"><i class="bi bi-house pe-1"></i>Dashboard</a>
                    </li>

                    <!-- LOGOUT -->
                    <li class="nav-item">
                        <a class="btn btn-danger me-2" href="../login.php"><i class="bi bi-box-arrow-right pe-1"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div><!-- END CONTAINER -->
    </nav><!-- END NAVBAR -->


    <!-- HERO SECTION -->
    <section class="hero-section text-center">
        <h1>Canadian Rockies & Alaska Cruise</h1>
    </section>

    <!-- MAIN CONTENT SECTION -->
    <div class="container my-5">
        <div class="row">
            <!-- Left Column - Tour Details -->
            <div class="col-md-8">
                <div class="details-container">
                    <h2>About the Tour</h2>
                    <p>Experience the majestic beauty of the Canadian Rockies and embark on a breathtaking Alaskan cruise with Norwegian Cruise Line. This exclusive package offers the best views, and a luxurious travel experience.</p>

                    <h4>Travel Itinerary</h4>
                    <div class="timeline">
                        <!-- Day 1 -->
                        <div class="timeline-item">
                            <span class="timeline-badge">Day 1 : 24 Jan 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                                
                                <!-- Link maps to Calgary -->
                                <a href="https://www.google.com/maps/place/Calgary" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Arrival in Calgary</h5>
                                    <p>Explore the vibrant city of Calgary</p>
                                </div>

                            </div>
                        </div>

                        <div class="timeline-item no-point">
                            <div class="timeline-content d-flex align-items-start">

                                <!-- Link maps to Canadian Rockies -->
                                <a href="https://www.google.com/maps/place/Canadian+Rockies" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Canadian Rockies</h5>
                                    <p>Begin your journey into the Canadian Rockies</p>
                                </div>
                            </div>
                        </div>

                        <!-- Day 2 -->
                        <div class="timeline-item">
                            <span class="timeline-badge">Day 2 : 25 Jan 2025</span>
                            <div class="timeline-content d-flex align-items-start">

                                <!-- Link maps to Lake Louise -->
                                <a href="https://www.google.com/maps/place/Lake+Louise,+Alberta,+Kanada/@51.4200823,-116.2115692,14z/data=!3m1!4b1!4m6!3m5!1s0x53775d28a0e1ce11:0x3c373c7b6365bce6!8m2!3d51.4253705!4d-116.1772552!16zL20vMDFmOHZz?entry=ttu&g_ep=EgoyMDI0MTExMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Lake Louise</h5>
                                    <p>Visit the iconic Lake Louise and admire the turquoise waters surrounded by snow-capped mountains.</p>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-badge">Day 3 : 26 Jan 2025</span>
                            <div class="timeline-content d-flex align-items-start">

                                <!-- Link maps to Icefields Parkway -->
                                <a href="https://www.google.com/maps/place/Icefields+Parkway,+Trans-Canada+Hwy,+Improvement+District+No.+9,+AB,+Kanada/@51.4377436,-116.204195,15z/data=!3m1!4b1!4m6!3m5!1s0x53775d4e315248bd:0x31b5d26d66d466c!8m2!3d51.4377446!4d-116.1938953!16s%2Fg%2F11bz0cty_j?entry=ttu&g_ep=EgoyMDI0MTExMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Icefields Parkway</h5>
                                    <p>Journey along the Icefields Parkway, stopping at the Columbia Icefield to experience a thrilling ride on an Ice Explorer.</p>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <span class="timeline-badge">Day 4 : 27 Jan 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                                
                                <!-- Link maps to Alaska Cruise -->
                                <a href="https://www.google.com/maps/place/Alaskan+Luxury+Cruises/@38.2559704,-171.3295719,3z/data=!4m10!1m2!2m1!1sAlaska+Cruise!3m6!1s0x56c899137960c651:0x99134d8883739968!8m2!3d46.423669!4d-129.9427086!15sCg1BbGFza2EgQ3J1aXNlWg8iDWFsYXNrYSBjcnVpc2WSAQtjcnVpc2VfbGluZZoBI0NoWkRTVWhOTUc5blMwVkpRMEZuU1VNM2RqZG1Va3QzRUFF4AEA!16s%2Fg%2F11hdmvtgq8?entry=ttu&g_ep=EgoyMDI0MTExMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Alaska Cruise</h5>
                                    <p>Travel to Vancouver and board your cruise ship.</p>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <span class="timeline-badge">Day 5 : 28 Jan 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                                
                                <!-- Link maps to Glacier Bay National Park -->
                                <a href="https://www.google.com/maps/place/Glacier+Bay+National+Park+and+Preserve/@58.7298366,-138.2115861,8z/data=!3m1!4b1!4m6!3m5!1s0x56aa0d09d34208a7:0xe293a4e7f3b63d60!8m2!3d58.6658073!4d-136.9002147!16zL20vMDM4d2s2?entry=ttu&g_ep=EgoyMDI0MTExMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Departure</h5>
                                    <p>Explore the awe-inspiring Glacier Bay National Park, home to massive glaciers and abundant wildlife.</p>
                                    <p>Disembark from the cruise ship and depart from Alaska.</p>
                                </div>
                            </div>
                        </div>

                        <br>

                        <!-- INCLUDED -->
                        <div class="rinci">
                            <h2>What's Included</h2>
                            <ul class="features-list">
                                <i class="bi bi-check-circle-fill text-success"></i> Transportation<br>
                                <i class="bi bi-check-circle-fill text-success"></i> Hotel accommodations<br>
                                <i class="bi bi-check-circle-fill text-success"></i> Tour Guide<br>
                                <i class="bi bi-check-circle-fill text-success"></i> Travel Insurance<br>
                                <i class="bi bi-check-circle-fill text-success"></i> Tour Ticket<br>
                            </ul>
                        </div><!-- END INCLUDED -->
                    </div><!-- END TIMELINE -->
                </div><!-- END DETAIL CONTAINER -->


                <!-- Right Column - Booking Details -->
                <div class="col-md-4">
                    <div class="details-sidebar">
                        <h4 class="text-center mb-3"><b>Tour Details</b></h4>
                        <p><strong>Duration:</strong> 5 Days</p>
                        <p><strong>Departure Date:</strong> January 24, 2025</p>
                        <p><strong>Return Date:</strong> January 28, 2025</p>
                        <div class="disc mb-1">Save more on your vacation! Discounts 5% for groups of more than 4 people!</div>
                        <div class="price-tag">Starting from IDR 22,000,000</div>
                        <div style="width: 100%; height: 2px; background-color: grey; margin: 1.2rem 0;"></div>
                        
                        <!-- ID TOUR -->
                        <?php $id_tour = 1; ?>
                        <!-- FORM -->
                        <form id="bookingForm" action="../php/booking.php" method="POST">

                            <!-- HIDDEN id_tour -->
                            <input type="hidden" name="id_tour" value="<?php echo $id_tour; ?>">

                            <!-- TOUR DATES -->
                            <div class="form-group">
                                <b><label for="tanggal">Tour Dates</label></b>
                                <input type="text" id="tanggal" class="form-control" value="24 - 28 January 2025" disabled>
                            </div>
                            <br>

                            <!-- JML PEMESAN -->
                            <div class="form-group">
                                <b><label for="count">Jumlah Pemesan</label></b>
                                <input type="number" id="count" name="count" class="form-control" value=" " placeholder="0" min="0" required>
                            </div>

                            <!-- BUTTON -->
                            <button type="submit" class="btn btn-book mt-3" name="submit">Book Now</button>

                            <!-- HISTORY DATA -->
                            <!-- <a class="btn btn-history btn-black mt-3 me-2" href="hasil.php?id_tour=1">History</a> -->


                        </form><!-- END FORM -->
                    </div>
                </div><!-- END RIGHT -->
            </div><!-- END LEFT -->
        </div>

        <!-- PLANE PICTURE -->
        <div class="highlight-section">
            <div class="highlight-overlay"></div>
            <div class="container highlight-content">

                <!-- Picture -->
                <div class="highlight-image me-4">
                    <img src="../gambar/booking.png" alt="Travel Image"> 
                </div>
                
                <!-- Description -->
                <div class="highlight-text">
                    <div>
                        <h2>Matrix Tour</h2>
                        <div class="underline"></div> 
                        <p1>Matrix Tour offers great potential to revolutionize the tourism industry. By leveraging technology, Matrix Tour can provide a more personalized, efficient and satisfying travel experience.</p1>
                    </div>
                </div>
            </div>
        </div><!-- END PLANE PICTURE -->


        <!-- FOOTER -->
        <footer class="footer text-center">
            <div class="container-fluid">
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
        </footer><!-- END FOOTER -->

        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>