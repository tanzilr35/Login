<?php

session_start(); // Mulai session

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <!-- Tambahkan style untuk tampilan halaman user -->
    <style>
    body{
        text-align: center;
    }
    </style>
</head>
<body>

    <h2>Selamat Datang <?php echo $_SESSION['Email']; ?></h2>
    <!-- echo $_SESSION['Email'] berfungsi untuk memanggil session nama yang telah di set pada proses login -->
    <!-- dimana nanti akan tampil nama email dari user yang login, diambil dari tb_login di database -->
    Klik disini untuk <a href = "logout.php">Logout</a>
    
</body>
</html>