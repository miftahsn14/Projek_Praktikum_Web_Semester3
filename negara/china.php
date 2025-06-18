<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
    <link rel="stylesheet" href="countryy.css">
    <link rel="stylesheet" href="../foot.css">
    <style>
        .hero-section {
            position: relative;
            background: url('../gambar/bei.jpg') center/cover no-repeat;
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

                        <a class="btn btn-black me-2" href="../dropdown/asset.php"><i class="bi bi-box me-2"></i>Assets</a>
                        <a class="btn btn-primary me-2" href="../dashboard.php"><i class="bi bi-house pe-1"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger me-2" href="../login.php"><i class="bi bi-box-arrow-right pe-1"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Hero Section -->
    <section class="hero-section text-center">
        <h1>Beijing & Shanghai
        </h1>
    </section>

    <!-- Main Content Section -->
    <div class="container my-5">
        <div class="row">
            <!-- Left Column - Tour Details -->
            <div class="col-md-8">
                <div class="details-container">
                    <h2>About the Tour</h2>
                    <p>Beijing is the capital of China and a vibrant metropolis that blends ancient traditions with modern advancements. Shanghai is a modern, cosmopolitan city that has transformed from a small fishing village into one of the world's leading financial centers.


                    </p>

                    <h4>Travel Itinerary</h4>
                    <div class="timeline">
                   
                        <div class="timeline-item">
                            <span class="timeline-badge">Day 1 : 10 July 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                                
                                <a href="https://maps.app.goo.gl/cS8F8VwFZfWwX5km8" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Arrival in Beijing
                                    </h5>
                                    <p>Visit the Forbidden City, the largest and best-preserved imperial palace in the world.

                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="timeline-item no-point">
                            <div class="timeline-content d-flex align-items-start">

                                <a href="https://maps.app.goo.gl/aqEpby9eZGBniu33A" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Tiananmen Square</h5>
                                    <p>Witness the vastness of Tiananmen Square, one of the largest public squares in the world.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        

                      
                        <div class="timeline-item">
                            <span class="timeline-badge">Day 2 : 11 July 2025</span>
                            <div class="timeline-content d-flex align-items-start">

                                <a href="https://maps.app.goo.gl/q8uoh3jLq3xPaDSB6" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">The Great Wall of China

                                    </h5>
                                    <p>Experience the wonder of the Great Wall of China, one of the most iconic world wonders.

                                    </p>
                                </div>
                            </div>
                        </div>

                        
                        <div class="timeline-item">
                            <span class="timeline-badge">Day 3 : 12 July 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                             
                                <a href="https://maps.app.goo.gl/T4hxtbRkvK5vPrnd6" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Modern Beijing</h5>
                                    <p>Visit the Temple of Heaven, a beautiful ancient temple complex
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="timeline-item">
                            <span class="timeline-badge">Day 4 : 13 July 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                                <a href="https://maps.app.goo.gl/xWzi2F7pHqzXrxk5A" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Shanghai Glamour</h5>
                                    <p>Explore Old Town Shanghai with its classic European-style buildings.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <span class="timeline-badge">Day 5 : 14 July 2025</span>
                            <div class="timeline-content d-flex align-items-start">
                             
                                <a href="https://maps.app.goo.gl/CieUNkTC7G5sXPxY6" target="_blank" class="me-3">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                </a>
                                <div>
                                    <h5 class="font-weight-bold">Shanghai Disneyland
                                    </h5>
                                    <p>Visit Shanghai Disneyland, the first Disney theme park on the Chinese mainland.


                                    </p>
                                </div>
                            </div>
                        </div>

                        
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
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="details-sidebar">
                        <h4 class="text-center mb-3">Tour Details</h4>
                        <p><strong>Duration:</strong> 5 Days</p>
                        <p><strong>Departure Date:</strong> July 10, 2025</p>
                        <p><strong>Return Date:</strong> July 14, 2025</p>
                        <div class="disc mb-1">Save more on your vacation! Discounts 5% for groups of more than 4 people!</div>
                        <div class="price-tag">Starting from IDR 24,000,000</div>
                        <div style="width: 100%; height: 2px; background-color: grey; margin: 1.2rem 0;"></div>

                        <!-- ID TOUR -->
                        <?php $id_tour = 4; ?>
                        <!-- FORM -->
                        <form id="bookingForm" action="../php/booking.php" method="POST">

                            <!-- HIDDEN id_tour -->
                            <input type="hidden" name="id_tour" value="<?php echo $id_tour; ?>">

                            <!-- TOUR DATES -->
                            <div class="form-group">
                                <b> <label for="tanggal">Tour Dates</label> </b>
                                <input type="text" id="tanggal" class="form-control" value="10 - 14 July 2025" disabled>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>


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
        </div>



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
        </footer>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>