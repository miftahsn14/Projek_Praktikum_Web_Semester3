<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Japan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
    <link rel="stylesheet" href="countryy.css">
    <link rel="stylesheet" href="../foot.css">
    <style>
        .hero-section {
            position: relative;
            background: url('../gambar/jap.jpg') center/cover no-repeat;
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
            <!-- Back Button -->
            <a class="btn btn-outline-danger me-3" href="../dashboard.php">
                <i class="bi bi-arrow-left"></i> Back
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

    <!-- HERO SECTION -->
    <section class="hero-section text-center">
        <h1>Japan</h1>
    </section>

    <!-- MAIN CONTENT SECTION -->
    <div class="container my-5">
        <div class="row">
            <!-- Left Column - Tour Details -->
            <div class="col-md-8">
                <div class="details-container">
                    <h2>About the Tour</h2>
                    <p>This 7-day tour is perfect for those who want to experience the best of Japan. Explore the vibrant city of Tokyo, the ancient capital of Kyoto, and the bustling metropolis of Osaka.
                    </p>

                    <h4>Travel Itinerary</h4>
                    <div class="timeline">
                   
                        <div class="timeline-item">
                            <span class="timeline-badge">Day 1 : 22 June 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                               
                                <a href="https://maps.app.goo.gl/ovCSgJtxxpGjsPtR9" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Arrival in Tokyo</h5>
                                    <p>Explore the vibrant Shibuya district, famous for its iconic Shibuya Crossing.
                                    </p>
                                </div>

                            </div>
                        </div>

                        

                        <!-- Day 2 -->
                        <div class="timeline-item">
                            <span class="timeline-badge">Day 2 : 23 June 2025</span>
                            <div class="timeline-content d-flex align-items-start">

                                <a href="https://maps.app.goo.gl/U2NAq9FqwABvimD49" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Tokyo Sightseeing</h5>
                                    <p>Visit the Tokyo Skytree, the tallest structure in Japan, for panoramic views of the city.</p>
                                </div>
                            </div>
                        </div>


                        <div class="timeline-item no-point">
                            <div class="timeline-content d-flex align-items-start">

                                <a href="https://maps.app.goo.gl/yPfngt4rBU1KevDU9" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Imperial Palace East Garden</h5>
                                    <p>Explore the Imperial Palace East Garden and learn about the history of the Imperial Family.</p>
                                </div>
                            </div>
                        </div>
                        

                        <div class="timeline-item">
                            <span class="timeline-badge">Day 3 : 24 June 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                               
                                <a href="https://maps.app.goo.gl/iQFr7TBaLqwNXpd46" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Kyoto</h5>
                                    <p>Travel from Tokyo to Kyoto by Shinkansen bullet train.</p>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <span class="timeline-badge">Day 4 : 25 June 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                            
                                <a href="https://maps.app.goo.gl/qCB3W5U3QHzTnm3y7" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Arashiyama Bamboo Grove</h5>
                                    <p>Visit the Arashiyama Bamboo Grove, a serene forest of tall bamboo stalks.</p>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <span class="timeline-badge">Day 5 : 26 June 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                               
                                <a href="https://maps.app.goo.gl/AC4nzFNBb5ofCoui7" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Osaka</h5>
                                    <p>Visit Osaka Castle, a historic landmark and symbol of the city. </p>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <span class="timeline-badge">Day 6 : 27 June 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                               
                                <a href="https://maps.app.goo.gl/8mEayo9S5gJJRXZ46" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Kobe Harborland</h5>
                                    <p>Visit the Kobe Harborland and enjoy the scenic views.
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="timeline-item">
                            <span class="timeline-badge">Day 7 : 28 June 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                              
                                <a href="https://maps.app.goo.gl/4gh96DLsg7NSLqDS8" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Departure</h5>
                                    <p>Depart from Kansai International Airport.

                                    </p>
                                </div>
                            </div>
                        </div>


                        <br>
                        <div class="rinci">
                            <h2>What's Included</h2>
                            <ul class="features-list">
                                <i class="bi bi-check-circle-fill text-success"></i> Transportation<br>
                                <i class="bi bi-check-circle-fill text-success"></i> Hotel accommodations<br>
                                <i class="bi bi-check-circle-fill text-success"></i> Tour Guide<br>
                                <i class="bi bi-check-circle-fill text-success"></i> Travel Insurance<br>
                                <i class="bi bi-check-circle-fill text-success"></i> Tour Ticket<br>
                            </ul>
                        </div>
                    </div><!-- END TIMELINE -->
                </div><!-- END DETAIL CONTAINER -->
                
                <!-- Right Column - Booking Details -->
                <div class="col-md-4">
                    <div class="details-sidebar">
                        <h4 class="text-center mb-3">Tour Details</h4>
                        <p><strong>Duration:</strong> 7 Days</p>
                        <p><strong>Departure Date:</strong> June 22, 2025</p>
                        <p><strong>Return Date:</strong> June 28, 2025</p>
                        <div class="disc mb-1">Save more on your vacation! Discounts 5% for groups of more than 4 people!</div>
                        <div class="price-tag">Starting from IDR 30,000,000</div>
                        <div style="width: 100%; height: 2px; background-color: grey; margin: 1.2rem 0;"></div>

                        <!-- ID TOUR -->
                        <?php $id_tour = 2; ?>
                        <!-- FORM -->
                        <form id="bookingForm" action="../php/booking.php" method="POST">

                            <!-- HIDDEN id_tour -->
                            <input type="hidden" name="id_tour" value="<?php echo $id_tour; ?>">

                            <!-- TOUR DATES -->
                            <div class="form-group">
                                <b> <label for="tanggal">Tour Dates</label> </b>
                                <input type="text" id="tanggal" class="form-control" value="22 - 28 June 2025" disabled>
                            </div>
                            <br>

                            <!-- JML PEMESAN -->
                            <div class="form-group">
                                <b> <label for="count">Jumlah Pemesan</label></b>
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
               
                <div class="highlight-image me-4">
                    <img src="../gambar/booking.png" alt="Travel Image"> 
                </div>
              
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