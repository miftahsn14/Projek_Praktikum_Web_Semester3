<!-- aku ragu sm kode php yg di atas ini mitt  -->
<!-- sedikit ga yakin juga sm line 157 - 173
UPDATE TERAKHIR : NGILANGIN $I DI name JENIS -->
<?php 

session_start();
if(empty($_SESSION['username'])){
    header("location:login.php?pesan=belum_login");
}

include '../php/koneksi.php';

// Tangkap data dari form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //$id_tour = isset($_POST['id_tour']) ? $_POST['id_tour'] : null;
    //$jumlah_pemesan = isset($_POST['count']) ? $_POST['count'] : null;
    $jumlah_pemesan = $_POST['count'];
    $id_tour = $_POST['id_tour']; // Ambil id_tour dari hidden inpu

    // Validasi data
    if ($id_tour && $jumlah_pemesan) {
        // Simpan data di variabel (bisa digunakan untuk input lebih lanjut)
        echo "ID Tour: " . htmlspecialchars($id_tour) . "<br>";
        echo "Jumlah Pemesan: " . htmlspecialchars($jumlah_pemesan) . "<br>";
    } else {
        echo "Data tidak lengkap.";
        exit;
    }
} else {
    echo "Akses tidak valid.";
    exit;
}







//include 'koneksi.php';

// Cek id_tour ada di parameter URL atau di POST
// if(isset($_POST['id_tour'])){
//     $id_tour = $ $_POST['id_tour']; //menangkap id_tour dri form sebelumnya
// }else{
//     // Jika id_tour tidak ada, redirect kembali ke halaman awal atau tampilkan pesan error
//     echo "ID Tour tidak ditemukan!";
//     exit;
// }

// // Cek apakah form telah disubmit

// if(isset($_POST['id_tour']) && isset($_POST['count'])){
//     var_dump($_POST['id_tour']);
//     // Ambil data dari form
//     $id_tour = $_POST['id_tour'];  // id_tour yang dikirim dari halaman negara
//     $jmlPemesan = $_POST['count'];  // Jumlah pemesan yang diinput di form

//     // Ambil nama negara berdasarkan id_tours
//     $sql = "SELECT country FROM tours WHERE id_tour = '$id_tour'";
//     $result = mysqli_query($conn, $sql);

//     if ($result) {
//         // Mengambil data negara
//         $data_tour = mysqli_fetch_assoc($result);
//         //$country = $data_tour['country'];
//     } else {
//         // Jika query gagal
//         echo "Error: " . mysqli_error($conn);
//         exit();
//     }
// } else {
//     // Jika data tidak ada, redirect atau tampilkan error
//     echo "Data tidak lengkap!";
//     exit();
    
// }
// Tutup koneksi
//$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>

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
            <h1>Booking Form</h1>
            <p>Complete the form!</p>
        </header>

        <!-- MAIN CONTENT -->
        <main>
            <!-- LOOPING BYK PEMESAN -->
            <?php 
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                
                $id_tour = isset($_POST['id_tour']) ? $_POST['id_tour'] : null; // Ambil id_tour 
                $jmlPemesan = isset($_POST['count']) ? intval($_POST['count']) : 0; // Ambil jml pemesan dari POST

                // Validasi jml pemesan min 1
                if($jmlPemesan > 0){?>
                    <!-- // FORM -->
                   <form action="../php/insert_booking.php" method="POST">
                   <input type="hidden" name="id_tour" value="<?php echo $id_tour; ?>">
                        <?php
                    //echo "<input type='hidden' name='id_tour' value='<?php echo $id_tour;  
                    //<!-- Kirim ulang data id_tour dan jumlah_pemesan -->
                    //echo "<input type='hidden' name='id_tour' value='<?php echo htmlspecialchars($id_tour); '>";
                    //echo "<input type='hidden' name='jumlah_pemesan' value='<?php echo htmlspecialchars($jumlah_pemesan); '>";
                  
                    
                    // Mengirimkan negara yang dipilih sebagai input tersembunyi
                    
                    //  echo "<input type='hidden' name='id_tour' value='" . htmlspecialchars($id_tour) . "'>";

                    // Loopingnya
                    for($i = 1; $i <= $jmlPemesan; $i++){
                        // Nama Pemesan
                        echo "<div class='form-group'>";
                        echo "    <label for='namaPemesan_$i'>$i. Nama Pemesan</label>";
                        echo "    <input type='text' class='form-control' id='namaPemesan_$i' name='namaPemesan[]' placeholder='Nama Pemesan' required>";
                        echo "</div>";
            
                        // Jumlah Orang
                        echo "<div class='form-group'>";
                        echo "    <label for='jumlahOrang_$i'>Jumlah Orang</label>";
                        echo "    <input type='number' class='form-control' id='jumlahOrang_$i' name='jumlahOrang[]' placeholder='0' min='1' required>";
                        echo "</div>";

                       // Jenis
echo "<div class='form-group'>";
echo "    <label class='ms-2'>Jenis:</label>";
echo "    <div>";
// Reguler
echo "        <div class='form-check'>";
echo "            <input type='radio' class='form-check-input' id='jenisReguler_$i' name='jenis[$i]' value='Reguler' required>";
echo "            <label class='form-check-label' for='jenisReguler_$i'>Reguler</label>";
echo "        </div>";
// Paket
echo "        <div class='form-check'>";
echo "            <input type='radio' class='form-check-input' id='jenisPaket_$i' name='jenis[$i]' value='Paket'>";
echo "            <label class='form-check-label' for='jenisPaket_$i'>Paket</label>";
echo "        </div>";
// Cicilan
echo "        <div class='form-check'>";
echo "            <input type='radio' class='form-check-input' id='jenisCicilan_$i' name='jenis[$i]' value='Cicilan'>";
echo "            <label class='form-check-label' for='jenisCicilan_$i'>Cicilan</label>";
echo "        </div>";
echo "    </div>";
echo "</div>";


                        echo "<hr>";
                    }
                        echo "<button type='submit' class='btn btn-submit btn-block' name='submit_booking'>Submit</button>";
                        echo "<button type='reset' class='btn btn-reset btn-block'>Reset</button>";
                    echo "</form>";  
                }
            }
            ?>
        </main><!-- END MAIN CONTENT -->
    </div><!-- END CONTAINER -->
    <script>
        //untuk cek jumlah orang yang diinput masuk kategori yang mana, agar tidak terjadi keasalahan input oleh agen
    function validateForm() {
    const jumlahOrangInputs = document.querySelectorAll("input[name='jumlahOrang[]']");
    let isValid = true;

    for (let i = 0; i < jumlahOrangInputs.length; i++) {
        const jumlahOrang = parseInt(jumlahOrangInputs[i].value, 10);
        const jenisSelected = document.querySelector(`input[name='jenis[${i + 1}]']:checked`); 

        if (!jenisSelected) {
            alert(`Silakan pilih jenis pemesanan untuk pemesan ke-${i + 1}.`);
            isValid = false;
            break;
        }

        if (jenisSelected.value === "Reguler" && jumlahOrang > 4) {
            alert(`Jenis Reguler hanya berlaku untuk jumlah orang kurang dari 4. Pemesan ke-${i + 1} tidak valid.`);
            isValid = false;
            break;
        }

        if (jenisSelected.value === "Paket" && jumlahOrang < 5) {
            alert(`Jenis Paket hanya berlaku untuk jumlah orang 5 atau lebih. Pemesan ke-${i + 1} tidak valid.`);
            isValid = false;
            break;
        }
    }

    return isValid;
}

// Pasang event listener untuk form
document.querySelector("form").onsubmit = validateForm;

</script>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>