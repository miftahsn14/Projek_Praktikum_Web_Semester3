<?php 
session_start();
if(empty($_SESSION['username'])){
    header("location:loginluar.php?pesan=belum_login");
}

include 'koneksi.php'; // Koneksi ke database 

// Data booking
$id_booking = $_GET['id_booking'] ?? null;

if ($id_booking) {
    $sql_booking = "SELECT *
                    FROM bookings b
                    JOIN tours t ON b.id_tour = t.id_tour
                    WHERE b.id_booking = '$id_booking';";
    $result_booking = mysqli_query($conn, $sql_booking);
    $booking = mysqli_fetch_assoc($result_booking);

    if (!$booking) {
        echo "Data booking tidak ditemukan.";
        exit;
    }

    $id_tour = $booking['id_tour'];
    $jumlah_orang = $booking['jml_orang'];
    $country = $booking['country'];
} else {
    echo "ID booking tidak ditemukan.";
    exit;
}

$sql_details = "SELECT * FROM details WHERE id_tour = '$id_tour'";
$result_details = mysqli_query($conn, $sql_details);
$details = mysqli_fetch_assoc($result_details);

if (!$details) {
    echo "Rincian biaya tidak ditemukan untuk tur ini.";
    exit;
}

/* Untuk ngecek data udah keambil belum
echo "enter";
if ($row) {
    echo '<pre>';
    print_r($row);
    echo '</pre>';
} else {
    echo "Data tidak ditemukan.";
}*/

// ----------------------- TOTAL RINCIAN BIAYA -------------------------------
// ANGGARAN
$total_tiket_pesawat =  $details['tiket_pesawat'] * $jumlah_orang;
$total_transportasi  =  $details['transportasi']  * $jumlah_orang;
$total_konsumsi      =  $details['konsumsi']      * $jumlah_orang;
$total_tiket_wisata  =  $details['tiket_wisata']  * $jumlah_orang;
$total_tour_guide    =  $details['tour_guide']    * $jumlah_orang;
$total_insurance     =  $details['insurance']     * $jumlah_orang;
$total_hotel         =  $details['hotel']         * $jumlah_orang;

// Jumlah anggaran
$jumlah_anggaran = $details['tiket_pesawat'] + 
                   $details['transportasi'] +
                   $details['konsumsi'] +
                   $details['tiket_wisata'] +
                   $details['tour_guide'] +
                   $details['insurance'] +
                   $details['hotel'];

// Jumlah asli total anggaran
$jumlah_total_anggaran = $jumlah_anggaran * $jumlah_orang;

// Harga jual total 
$jumlah_jual = $booking['price'] * $jumlah_orang;

// Cek apakah jumlah orang lebih dari 4 untuk memberikan diskon 5%
if ($booking['jenis'] === 'Paket') {
    $diskon = 0.05 * $jumlah_jual; // diskon 5% 
    $total_harga_akhir = $jumlah_jual - $diskon; // Harga setelah diskon
} else {
    $total_harga_akhir = $jumlah_jual; // Jika jumlah orang <= 4, tidak ada diskon
}

$total_cicilan = 0;
// Total yang dibayar (setelah diskon)
$total_harga_akhir;

// CICILAN
if ($booking['jenis'] === 'Cicilan') {
    // Jenis cicilan: Pajak 7% tetap dikenakan, tidak ada diskon
    $pajak_cicilan = 0.07 * $jumlah_jual;
    $total_cicilan = $jumlah_jual + $pajak_cicilan;

    $diskon = 0; // Tidak ada diskon untuk jenis cicilan
    $total_harga_akhir = $total_cicilan; // Harga akhir adalah jumlah jual + pajak

    // Pembagian cicilan
    $cicilan_tiga_kali = $total_harga_akhir / 3;

} 


// KEUNTUNGAN
$untung_satuan = $booking['price'] - $jumlah_anggaran;
$untung_total = $total_harga_akhir - $jumlah_total_anggaran;
$untung_cicilan = $total_cicilan - $jumlah_total_anggaran ;    



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <style>
        .header {
            background-color: #a8d5af;
            color: #333;
            padding: 20px;
            text-align: center;
            font-size: 50px;
            font-family: 'Lucida Sans';
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header img {
            width: 120px;
            height: 90px;
            margin-right: 10px;
        }

        .table-custom th {
            background-color: #f1e1b0;

        }

        .table-custom td {
            text-align: left;
            padding: 8px;

        }

        .table-custom th {
            text-align: left;
            padding: 8px;
            text-align: center;
        }


        .budget-bar-planned {
            background-color: #5bc0de;
            border-radius: 15px;
            width: 100%;
            padding-left: 10px;
            color: white;
            line-height: 30px;
            font-weight: bold;
            font-family: sans-serif;
        }

        .budget-bar-actual {
            background-color: #f0ad4e;
            border-radius: 15px;
            width: 100%;
            padding-left: 10px;
            color: white;
            line-height: 30px;
            font-weight: bold;
            font-family: sans-serif;
        }

        .info-box {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #f7f7f7;
        }

        .highlight-text {
            color: #449e6a;
            font-weight: bold;
        }

        .btn-back {
            position: absolute;

            top: 20px;
            left: 50px;
        }
        .rincian{
            font-family: 'Lucida Sans';
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- JUDUL DETAIL -->
    <div class="header">
        <img src="../gambar/booking.png" alt="Logo">
        Details
    </div>

    <!-- CONTAINER -->
    <div class="container my-3">

        <!-- BUTTON BACK -->
        <a class="btn btn-danger btn-back" href="javascript:history.back()">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        

        <!-- DATA PEMESAN -->
        <div class="row">
            <div class="col-md-6 info-box">
                <h5>🗺 <b>Trip to : </b><span class="highlight-text"><?php echo $booking['country']; ?></span></h5>
                <h5>📅 <b>Time</b><b style="margin-left:22px;">: </b><?php echo $booking['tanggal']; ?></h5>
            </div>
            <div class="col-md-6 info-box">
                
                <h6><strong>Nama Pemesan</strong><b style="margin-left:10px;">: </b><?php echo $booking['nama_pemesan']; ?></h6>
                <h6><strong>Jumlah Orang</strong><b style="margin-left:20px;">: </b><?php echo $booking['jml_orang']; ?></h6>
                <h6><strong>Jenis</strong><b style="margin-left:89px;">: </b><?php echo $booking['jenis']; ?></h6> <!--reg/promo/cicilan -->
            </div>
        </div>

        

        <!-- RINCIAN BIAYA -->
        <!-- CONTAINER -->
        <div class="container">
            <div style="width: 100%; height: 1.4px; background-color: grey; margin: 1.2rem 0;"></div>
            <h3 class="text-center align-middle rincian"><b>RINCIAN BIAYA</b></h3><br>
            <table class="table table-bordered table-custom">
                <thead>
                    <tr>
                        <th>Kategori Pengeluaran</th>
                        <th>Anggaran</th>
                        <th>Banyak</th>
                        <th>Total Anggaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiket Pesawat</td>
                        <td class="text-center align-middle"><?php echo number_format($details['tiket_pesawat'], 0, ',', '.'); ?></td>
                        <td class="text-center align-middle"><b>x<?php echo $booking['jml_orang']; ?></b></td>
                        <td class="text-center align-middle"><?php echo number_format($total_tiket_pesawat, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Transportasi</td>
                        <td class="text-center align-middle"><?php echo number_format($details['transportasi'], 0, ',', '.'); ?></td>
                        <td class="text-center align-middle"><b>x<?php echo $booking['jml_orang']; ?></b></td>
                        <td class="text-center align-middle"><?php echo number_format($total_transportasi, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Konsumsi</td>
                        <td class="text-center align-middle"><?php echo number_format($details['konsumsi'], 0, ',', '.'); ?></td>
                        <td class="text-center align-middle"><b>x<?php echo $booking['jml_orang']; ?></b></td>
                        <td class="text-center align-middle"><?php echo number_format($total_konsumsi, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Tiket Wisata</td>
                        <td class="text-center align-middle"><?php echo number_format($details['tiket_wisata'], 0, ',', '.'); ?></td>
                        <td class="text-center align-middle"><b>x<?php echo $booking['jml_orang']; ?></b></td>
                        <td class="text-center align-middle"><?php echo number_format($total_tiket_wisata, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Tour Guide</td>
                        <td class="text-center align-middle"><?php echo number_format($details['tour_guide'], 0, ',', '.'); ?></td>
                        <td class="text-center align-middle"><b>x<?php echo $booking['jml_orang']; ?></b></td>
                        <td class="text-center align-middle"><?php echo number_format($total_tour_guide, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Travel Insurance</td>
                        <td class="text-center align-middle"><?php echo number_format($details['insurance'], 0, ',', '.'); ?></td>
                        <td class="text-center align-middle"><b>x<?php echo $booking['jml_orang']; ?></b></td>
                        <td class="text-center align-middle"><?php echo number_format($total_insurance, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Hotel</td>
                        <td class="text-center align-middle"><?php echo number_format($details['hotel'], 0, ',', '.'); ?></td>
                        <td class="text-center align-middle"><b>x<?php echo $booking['jml_orang']; ?></b></td>
                        <td class="text-center align-middle"><?php echo number_format($total_hotel, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Asli</td>
                        <td class="text-center align-middle"><?php echo number_format($jumlah_anggaran, 0, ',', '.'); ?></td>
                        <td class="text-center align-middle"><b>x<?php echo $booking['jml_orang']; ?></b></td>
                        <td class="text-center align-middle"><?php echo number_format($jumlah_total_anggaran, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah Jual</b></td>
                        <td class="text-center align-middle"><?php echo number_format($booking['price'], 0, ',', '.'); ?></td>
                        <td class="text-center align-middle"><b>x<?php echo $booking['jml_orang']; ?></b></td>
                        <td class="text-center align-middle"><b><?php echo number_format($jumlah_jual, 0, ',', '.'); ?></b></td>
                    </tr>

                    <!-- PROMO -->
                    <?php if($jumlah_orang > 4){ ?>
                    <tr>
                        <td colspan="2"><strong>Promo</strong></td>
                        <td class="text-center align-middle"><b>5%</b></td>
                        <td class="text-center align-middle"><b><?php echo number_format($diskon, 0, ',', '.'); ?></b></td>
                    </tr>
                    <?php }else{ ?>
                    <tr>
                        <td colspan="2"><strong>Promo</strong></td>
                        <td class="text-center align-middle"><b>-</b></td>
                        <td class="text-center align-middle"><b>0</b></td>
                    </tr>
                    <?php
                    } ?>
                    

                </tbody>
            </table>
        </div><!-- END CONTAINER -->



        <!-- RINCIAN CICILAN -->
        <?php if ($booking['jenis'] === 'Cicilan') { ?>
        <div class="container">
        <div style="width: 100%; height: 1.4px; background-color: grey; margin: 1.2rem 0;"></div>
        <h3 class="text-center align-middle rincian"><b>RINCIAN CICILAN</b></h3><br>
            <table class="table table-bordered table-custom">
                <thead>
                    <tr>
                        <th colspan="2">Pembayaran Cicilan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pajak</td>
                        <td class="text-center align-middle">7%</td>
                    </tr>
                    <tr>
                        <td>Harga Pajak</td>
                        <td class="text-center align-middle"><?php echo number_format($pajak_cicilan, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td><b>Cicilan 1</b></td>
                        <td class="text-center align-middle"><b><?php echo number_format($cicilan_tiga_kali, 0, ',', '.'); ?></b></td>
                    </tr>
                    <tr>
                        <td><b>Cicilan 2</b></td>
                        <td class="text-center align-middle"><b><?php echo number_format($cicilan_tiga_kali, 0, ',', '.'); ?></b></td>
                    </tr>
                    <tr>
                        <td><b>Cicilan 3</b></td>
                        <td class="text-center align-middle"><b><?php echo number_format($cicilan_tiga_kali, 0, ',', '.'); ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php } ?>

        <!-- TOTAL BAYAR -->
        <?php if ($booking['jenis'] === 'Reguler') { ?>
            <div class="budget-bar-planned">Total : <?php echo number_format($total_harga_akhir, 0, ',', '.'); ?></div>
            <br>

            <?php 
            }else if($booking['jenis'] === 'Paket'){ ?>
                <div class="budget-bar-planned">Total : <?php echo number_format($total_harga_akhir, 0, ',', '.'); ?></div>
                <br>
            
            <?php 
            }else if($booking['jenis'] === 'Cicilan'){ ?>
                <div class="budget-bar-planned">Total : <?php echo number_format($total_cicilan, 0, ',', '.'); ?></div>
                <br>
            <?php 
            }?>
                




       <!-- RINCIAN KEUNTUNGAN -->
<div class="container">
    <div style="width: 100%; height: 1.4px; background-color: grey; margin: 1.2rem 0;"></div>
    <h3 class="text-center align-middle rincian"><b>RINCIAN KEUNTUNGAN</b></h3><br>
    <table class="table table-bordered table-custom">
        <thead>
            <tr>
                <th><?php echo $booking['country']?></th>
                <th>Harga Jual</th>
                <th>Harga Jual setelah Diskon/Pajak</th>
                <th>Harga Asli</th>
                <th>Keuntungan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Per satu orang</td>
                <td class="text-center align-middle"><?php echo number_format($booking['price'], 0, ',', '.'); ?></td>
                <td class="text-center align-middle">-</td>
                <td class="text-center align-middle"><?php echo number_format($jumlah_anggaran, 0, ',', '.'); ?></td>
                <td class="text-center align-middle"><?php echo number_format($untung_satuan, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td>Total</td>
                <td class="text-center align-middle"><?php echo number_format($jumlah_jual, 0, ',', '.'); ?></td>
                <td class="text-center align-middle">
                    <?php 
                    // Jika jenis cicilan, tampilkan total 
                    if ($booking['jenis'] === 'Cicilan') {
                        echo number_format($total_cicilan, 0, ',', '.');
                    } else {
                        echo number_format($total_harga_akhir, 0, ',', '.');
                    }
                    ?>
                </td>
                <td class="text-center align-middle"><?php echo number_format($jumlah_total_anggaran, 0, ',', '.'); ?></td>
                <td class="text-center align-middle">
                    <b>
                        <?php 
                        // Jika jenis cicilan, tampilkan keuntungan cicilan, jika bukan, tampilkan untung total
                        if ($booking['jenis'] === 'Cicilan') {
                            echo number_format($untung_cicilan, 0, ',', '.');
                        } else {
                            echo number_format($untung_total, 0, ',', '.');
                        }
                        ?>
                    </b>
                </td>
            </tr>
        </tbody>
    </table>
</div>

        
       

        <!-- TOTAL KEUNTUNGAN -->
        <?php if ($booking['jenis'] === 'Reguler') { ?>
            <div class="budget-bar-planned">Keuntungan : <?php echo number_format($untung_total, 0, ',', '.'); ?></div>
            <br>

            <?php 
            }else if($booking['jenis'] === 'Paket'){ ?>
                <div class="budget-bar-planned">Keuntungan : <?php echo number_format($untung_total, 0, ',', '.'); ?></div>
                <br>
            
            <?php 
            }else if($booking['jenis'] === 'Cicilan'){ ?>
                <div class="budget-bar-planned">Keuntungan : <?php echo number_format($untung_cicilan, 0, ',', '.'); ?></div>
                <br>
            <?php 
            }?>
          
        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>

<?php 
// Query untuk menyimpan keuntungan ke dalam tabel
$sql_update = "UPDATE bookings SET keuntungan = ? WHERE id_booking = ?";
$stmt = $conn->prepare($sql_update);
$stmt->bind_param("di", $untung_total, $id_booking);
$stmt->execute();
?>