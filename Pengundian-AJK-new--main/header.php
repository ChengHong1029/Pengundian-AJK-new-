<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Pengundian Kadet Bomba</title>

    <style>

    /* =========================
       GLOBAL
    ========================= */
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", sans-serif;
    }

    body{
        background: #f4f6f9;
    }

    /* =========================
       NAVBAR
    ========================= */
    .navbar{
        width: 100%;

        padding: 15px 35px;

        display: flex;
        justify-content: space-between;
        align-items: center;

        position: sticky;
        top: 0;
        z-index: 1000;

        background: rgba(255,255,255,0.18);

        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);

        border-bottom: 1px solid rgba(255,255,255,0.25);

        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }

    /* Logo */
    .logo{
        font-size: 18px;
        font-weight: 700;
        color: #2c3e50;
    }

    /* Navigation */
    .nav-links{
        display: flex;
        align-items: center;
        gap: 15px;
    }

    /* Links */
    .nav-links a{
        text-decoration: none;

        color: #2c3e50;

        padding: 8px 15px;

        border-radius: 8px;

        transition: 0.3s;

        font-size: 14px;
        font-weight: 500;
    }

    /* Hover */
    .nav-links a:hover{
        background: rgba(255,255,255,0.35);

        color: #2563eb;

        transform: translateY(-2px);
    }

    /* =========================
       RESPONSIVE
    ========================= */
    @media screen and (max-width: 768px){

        .navbar{
            flex-direction: column;
            gap: 15px;
            padding: 20px;
        }

        .logo{
            text-align: center;
            font-size: 16px;
        }

        .nav-links{
            flex-wrap: wrap;
            justify-content: center;
        }

    }

    </style>

</head>

<body>

<!-- =========================
     NAVBAR
========================= -->
<div class="navbar">

    <!-- Logo -->
    <div class="logo">
        SISTEM PENGUNDIAN AJK KADET BOMBA SMJK JIT SIN II
    </div>

    <!-- Navigation -->
    <div class="nav-links">

    <?php if (!empty($_SESSION['tahap']) && $_SESSION['tahap'] == "ADMIN") { ?>

        <a href="index.php">Laman Utama</a>
        <a href="calon-senarai.php">Senarai Calon</a>
        <a href="pengguna-senarai.php">Senarai Pengguna</a>
        <a href="jawatan-daftar.php">Senarai Jawatan</a>
        <a href="keputusan.php">Keputusan</a>
        <a href="logout.php">Logout</a>

    <?php } else if (!empty($_SESSION['tahap']) && $_SESSION['tahap'] == "PENGGUNA") { ?>

        <a href="index.php">Laman Utama</a>
        <a href="undi_kedudukan.php">Borang Pengundian</a>
        <a href="logout.php">Logout</a>

    <?php } else { ?>

        <a href="index.php">Laman Utama</a>

    <?php } ?>

    </div>

</div>