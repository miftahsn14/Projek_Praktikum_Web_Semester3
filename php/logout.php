<?php
session_start();
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Mengakhiri sesi
header("location: login.php?pesan=logout"); // Redirect ke halaman login
exit();

?>