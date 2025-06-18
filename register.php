<?php
session_start();
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "agen_tour";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if passwords match
    if ($password != $confirm_password) {
        echo "<script>alert('Password dan Confirm Password tidak sama!');</script>";
    } else {
        // Check for unique username
        $check_user_query = "SELECT * FROM user WHERE username = '$username'";
        $result = $conn->query($check_user_query);

        if ($result->num_rows > 0) {
            echo "<script>alert('Username sudah ada, gunakan username lain.');</script>";
        } else {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan. Silakan coba lagi.');</script>";
            }
        }
    }
}

$conn->close();
?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>REGISTER</title>
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
            font-family: ganeva;
        }
    </style>
</head>

<body class="body-register">
    <div class="blur-background"></div> 
    
    <div class="d-flex justify-content-center align-items-center vh-100 card-container">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 10px;">
            <div class="text-center mb-3">
         
                <img src="gambar/booking.png" alt="Matrix Tour Logo" style="width: 100px; height: auto;">
            </div>
            
            <div class="card-body">
                <h3 class="text-center mb-3"><b>Matrix Tour</b></h3>
                <h4 class="text-center align-middle mb-4">Register</h4>

                <form method="POST" action="register.php">
              
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control mt-2" id="username" name="username" placeholder="Enter username" required>
                    </div>

           
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control mt-2" id="password" name="password" placeholder="Enter password" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control mt-2" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
                    </div>
                    <button type="submit" class="btn btn-secondary w-100">Register</button>
                </form>
                
                <div class="text-center mt-3">
                    <small>Sudah punya akun? <a href="login.php">Login di sini</a></small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
