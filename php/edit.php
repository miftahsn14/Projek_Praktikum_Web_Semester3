<?php 
include 'koneksi.php'; //koneksi ke database



// Periksa apakah id_booking dikirim melalui GET
if(isset($_GET["id_booking"])){
    $id_booking = $_GET['id_booking'];

    // Aambil data booking berdasarkan id_booking
    $sql = "SELECT * FROM bookings WHERE id_booking = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_booking);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah data ditemukan
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        //$jmlPemesan = $row['jmlPemesan']; // Ambil nilai jumlah pemesan
        // Ambil detail pemesan
        $sqlDetail = "SELECT * FROM bookings WHERE id_booking = ?";
        $stmtDetail = $conn->prepare($sqlDetail);
        $stmtDetail->bind_param("i", $id_booking);
        $stmtDetail->execute();
        $resultDetail = $stmtDetail->get_result();
        
        // Simpan detail pemesan dalam array
        $detailPemesan = [];
        while ($rowDetail = $resultDetail->fetch_assoc()) {
            $detailPemesan[] = $rowDetail;
        }
    }else{
        echo "Data tidak ditemukan";
        exit;
    }   
}else{
    echo "ID booking tidak ditemukan";
    exit;
}
if (!isset($jmlPemesan) || !is_numeric($jmlPemesan) || $jmlPemesan <= 0) {
    $jmlPemesan = 1; 
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>

    <!-- BS + BS ICON -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .btn-back {
            position: fixed;
            z-index: 10;

            left: 50px;
        }

        .blur-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../gambar/gedung.webp');
            background-size: cover;
            background-attachment: fixed;
            filter: blur(1px);
            z-index: -1;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            /*transpar putih*/
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 5;
        }

        .logo {
            width: 200px;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
        }

        h1,
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
            font-family: Lucida Sans;
        }

        p {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 500;
            color: #333;
        }
        .btn-submit {
            background-color: orange;
            color: white;

        }
        .btn-submit:hover {
            background-color: darkorange;

        }
        .btn-reset {
            background-color: #d3d3d3;
            color: black;
        }
        .btn-reset:hover {
            background-color: #a9a9a9;

        }
    </style>
</head>

<body>
    <div class="blur-background"></div>
    <!-- BACK -->
    <a class="btn btn-danger me-3" href="javascript:history.back()">
        <i class="bi bi-arrow-left"></i>Back
    </a>

    <!-- CONTAINER -->
    <div class="container">

        <!-- HEADER -->
        <header>
            <img src="../gambar/booking.png" alt="Airplane Logo" class="logo">
            <h1>Edit Booking</h1>
            <p>Edit the form!</p>
        </header>

        <!-- MAIN CONTENT -->
        <main>
            <!-- LOOPING BYK PEMESAN -->
            <?php 
            // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //     echo "Form berhasil dikirim menggunakan POST.<br>";
            // } else {
            //     var_dump($_POST);
            //     echo "Form tidak menggunakan metode POST.";
            //     exit;
            // }

            // if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //             echo "<pre>";
    // var_dump($_POST); // Menampilkan semua data POST
    // echo "</pre>";
    // exit;
              ?>
                    <!-- // FORM -->
                    <form action="process_edit.php" method="POST">
                    
                        <!-- HIDDEN ID BOOKING -->
                        <input type="hidden" name="id_booking[]" value="<?php echo $row['id_booking']; ?>">

                        
                        
                        <!-- kayake ini ngaruh ke tampilan hasil yg negara atau sesuai urutan input itu deh
                        aslinay gini: 
                        - <input type="hidden" name="id_booking" value="<php echo htmlspecialchars($data['id_booking']); ?>">

                        - <input type="hidden" name="id_booking[]" value="1">

                        - <input type="hidden" name="id_booking" value="?php echo $row['id_booking']; ?>">
                        -->
                    <?php
                    // Loopingnya
                    for ($i = 1; $i <= $jmlPemesan; $i++){
                        // Ambil data dari database untuk setiap pemesan
                        $defaultNama = isset($detailPemesan[$i-1]['nama_pemesan']) ? $detailPemesan[$i-1]['nama_pemesan'] : '';
                        $defaultJumlahOrang = isset($detailPemesan[$i-1]['jml_orang']) ? $detailPemesan[$i-1]['jml_orang'] : '';
                        $defaultJenis = isset($detailPemesan[$i-1]['jenis']) ? $detailPemesan[$i-1]['jenis'] : '';
                    
                        // Nama Pemesan
                        echo "<div class='form-group'>";
                        echo "    <label for='namaPemesan_$i'>$i. Nama Pemesan</label>";
                        echo "    <input type='text' class='form-control' id='namaPemesan_$i' name='namaPemesan[]' placeholder='Nama Pemesan' value='" . htmlspecialchars($defaultNama) . "' required>";
                        echo "</div>";
                    
                        // Jumlah Orang
                        echo "<div class='form-group'>";
                        echo "    <label for='jumlahOrang_$i'>Jumlah Orang</label>";
                        echo "    <input type='number' class='form-control' id='jumlahOrang_$i' name='jumlahOrang[]' placeholder='0' min='1' value='" . htmlspecialchars($defaultJumlahOrang) . "' required>";
                        echo "</div>";
                    
                        // Jenis
                        
                        echo "<div class='form-group'>";
                        echo "    <label class='ms-2'>Jenis :</label>";
                        echo "    <div>";
                        echo "        <div class='form-check'>";
                        echo "            <input type='radio' class='form-check-input' id='jenisReguler_$i' name='jenis[]' value='Reguler' " . ($defaultJenis === 'Reguler' ? 'checked' : '') . " required>";
                        echo "            <label class='form-check-label' for='jenisReguler_$i'>Reguler</label>";
                        echo "        </div>";
                        echo "        <div class='form-check'>";
                        echo "            <input type='radio' class='form-check-input' id='jenisPaket_$i' name='jenis[]' value='Paket' " . ($defaultJenis === 'Promo' ? 'checked' : '') . ">";
                        echo "            <label class='form-check-label' for='jenisPaket_$i'>Paket</label>";
                        echo "        </div>";
                        echo "        <div class='form-check'>";
                        echo "            <input type='radio' class='form-check-input' id='jenisCicilan_$i' name='jenis[]' value='Cicilan' " . ($defaultJenis === 'Cicilan' ? 'checked' : '') . ">";
                        echo "            <label class='form-check-label' for='jenisCicilan_$i'>Cicilan</label>";
                        echo "        </div>";
                        echo "    </div>";
                        echo "</div>";
                        echo "<hr>";
                    }
                    
                    
                        echo "<button type='submit' class='btn btn-submit btn-block' name='submit_booking'>Submit</button>";
                        echo "<button type='reset' class='btn btn-reset btn-block'>Reset</button>";
                    echo "</form>";  
                //}
            //}
            ?>
        </main><!-- END MAIN CONTENT -->
    </div><!-- END CONTAINER -->

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>