<?php
session_start();
session_destroy();
?>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>LOGIN</title>
</head>

<body class="body-login" style="background: url('gambar/agentbg.png') no-repeat; background-size:cover">
    <!-- cek pesan notifikasi -->
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<script>alert('Login gagal! username dan password salah!')</script>";
        } else if ($_GET['pesan'] == "logout") {
            echo "<script>alert('Anda telah berhasil logout!');</script>";
        } else if ($_GET['pesan'] == "belum_login") {
            echo "<script>alert('Harap Login Terlebih Dahulu untuk Mengakses Halaman');</script>";
        }
    }

    ?>
    <style>
        .body-register {
            background: url('gambar/agentbg.png') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        .blur-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(1px); 
            background-color: rgba(0, 0, 0, 0.5); 
            z-index: 1;
        }

        .card-container {
            position: relative;
            z-index: 2;
            opacity: 92%;
            
        }
        .text-center {
            font-family:ganeva ;
        }
    </style>


    <div class="blur-background"></div>


    <div class="d-flex justify-content-center align-items-center vh-100 card-container">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 10px;">
            <div class="text-center">
                <img src="gambar/booking.png" alt="Matrix Tour Logo" style="width: 100px; margin-bottom: 15px;">
            </div>
            <div class="card-body">
                <h2 class="text-center mb-3"><b>Matrix Tour</b></h2>
                <h4 class="text-center mb-4">Login</h4>

                <!-- FORM -->
                <form method="POST" action="php/ceklogin.php">
               
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control mt-2" id="username" name="username" placeholder="Enter username" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control mt-2" id="password" name="password" placeholder="Enter password" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block w-100">Login</button>
                    <div class="text-center mt-3">
                        <small>Belum punya akun? <a href="register.php">Daftar di sini</a></small>
                    </div>
                </form><!-- END FORM-->
            </div><!-- END CARD -->
        </div><!-- END SIZE -->
    </div><!-- END POSITION -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>