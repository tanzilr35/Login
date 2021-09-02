<?php

session_start(); # Mulai sessionnya
$conn = mysqli_connect('localhost', 'root', '' , 'login-session') or die ('Unable to connect');
// Berfungsi untuk menghubungkan dengan database MYSQL

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan style untuk tampilan halaman login -->
    <style>
        body{
            text-align: center;
        }

        .field{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <!-- Form Login -->
    <h2>Halaman Login</h2>
    <div>
        <form action = "index.php" method = "post">
            <input type = "text" class = "field" name = "Email" placeholder = "Email" required = ""><br/>
            <input type = "password" class = "field" name = "Pass" placeholder = "Password" required = ""><br/>
            <input type = "submit" class = "field" name = "login" value = "Login">
        </form>
    </div>

<?php
    // Cek apakah user sudah login atau belum
    if (isset($_POST['login'])){
        $Email = $_POST['Email']; // Ambil value email yang dikirim dari form login
        $Pass = $_POST['Pass']; // Ambil value password yang dikirim dari form login

    // Buat query untuk mengecek apakah ada data user dengan email dan password yang dikirim dari form berdasarkan tabel database
    $select = mysqli_query($conn," SELECT * FROM tb_login WHERE Email = '$Email' AND Pass = '$Pass' ");
    $row  = mysqli_fetch_array($select); // Ambil datanya dari hasil query

    // Cek apakah variabel $row ada datanya atau tidak
    if(is_array($row)) {
        $_SESSION["Email"] = $row['Email']; // Simpan email di session
        $_SESSION["Pass"] = $row['Pass']; // Simpan password di session
    }   else { // Tambah peringatan jika email atau password salah
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Email or Password!");';
        echo 'window.location.href = "index.php" ';
        echo '</script>';
    }
    }
    // Cek jika email ada berarti user sudah login
    if(isset($_SESSION["Email"])){ // Jika tidak ada session email berarti user belum login
        header("Location:login.php"); // Redirect ke halaman login.php
    }
?>

</body>
</html>