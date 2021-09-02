<?php

session_start(); // Mulai session
if(session_destroy()){ // Hapus semua session
    header("location: index.php"); // Redirect ke halaman awal (index.php)
}

?>