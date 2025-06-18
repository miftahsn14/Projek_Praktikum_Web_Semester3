<?php 
session_start();
if(empty($_SESSION['username'])){
    header("location:../login.php?pesan=belum_login");
}

include '../php/koneksi.php';


$sql_sum = "SELECT 
    SUM(CASE WHEN jenis = 'Reguler' THEN keuntungan ELSE 0 END) AS total_reguler,
    SUM(CASE WHEN jenis = 'Paket' THEN keuntungan ELSE 0 END) AS total_paket,
    SUM(CASE WHEN jenis = 'Cicilan' THEN keuntungan ELSE 0 END) AS total_cicilan,
    SUM(keuntungan) AS total_keuntungan
FROM bookings";
$result_sum = mysqli_query($conn, $sql_sum);


$total_reguler = 0;
$total_paket = 0;
$total_cicilan = 0;
$total_keuntungan = 0;

if ($result_sum) {
    $row_sum = mysqli_fetch_assoc($result_sum);
    $total_reguler = $row_sum['total_reguler'] ?? 0;
    $total_paket = $row_sum['total_paket'] ?? 0;
    $total_cicilan = $row_sum['total_cicilan'] ?? 0;
    $total_keuntungan = $row_sum['total_keuntungan'] ?? 0;
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assets</title>

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
            border-radius: 8px;
            width: 100%;
            padding-left: 10px;
            color: white;
            line-height: 40px;
            font-weight: bold;
            font-family: sans-serif;
        }

        .btn-back {
            position: absolute;
            top: 20px;
            left: 50px;
        }
    </style>
</head>

<body>

    
    <div class="header">
        <img src="../gambar/booking.png" alt="Logo">
        Assets
    </div>

   
    <div class="container my-3">
     
        <a href="javascript:history.back()" class="btn btn-danger btn-back">
            <i class="bi bi-arrow-left"></i> Back
        </a>

    
        <div class="container">
            <table class="table table-bordered table-custom">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Jumlah Keuntungan</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- REGULER -->
                    <tr>
                        <td>Reguler</td>
                        <td class="text-center align-middle"><?php echo number_format($total_reguler, 0, ',', '.'); ?></td>
                    </tr>

                    <!-- PAKET -->
                    <tr>
                        <td>Paket</td>
                        <td class="text-center align-middle"><?php echo number_format($total_paket, 0, ',', '.'); ?></td>
                    </tr>

                    <!-- CICILAN -->
                    <tr>
                        <td>Cicilan</td>
                        <td class="text-center align-middle"><?php echo number_format($total_cicilan, 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

       
        <div class="container mt-4">
            <div class="budget-bar-planned">Total Keuntungan: <?php echo number_format($total_keuntungan, 0, ',', '.'); ?></div>
        </div>

     
        <div class="container mt-4">
            <canvas id="keuntunganChart"></canvas>
        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // datanya
        const data = {
            labels: ['Reguler', 'Paket', 'Cicilan'],
            datasets: [{
                label: 'Keuntungan (Rp)',
                data: [
                    <?php echo $total_reguler; ?>,
                    <?php echo $total_paket; ?>,
                    <?php echo $total_cicilan; ?>
                ],
                backgroundColor: ['#36a2eb', '#ff6384', '#ffcd56'],
                borderColor: ['#36a2eb', '#ff6384', '#ffcd56'],
                borderWidth: 1
            }]
        };

     // chart.js config nya
        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const ctx = document.getElementById('keuntunganChart').getContext('2d');
        new Chart(ctx, config);
    </script>

</body>
</html>
