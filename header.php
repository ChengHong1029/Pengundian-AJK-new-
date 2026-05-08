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

    <title>Sistem Pengundian STEM</title>

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
        background:
        linear-gradient(135deg,
        #050816,
        #0f172a,
        #111827);

        background-attachment: fixed;

        color: #e2e8f0;
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

        background: rgba(5,8,22,0.82);

        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);

        border-bottom: 1px solid rgba(0,245,255,0.12);

        box-shadow:
        0 0 25px rgba(0,245,255,0.08);
    }

    /* =========================
       LOGO
    ========================= */
    .logo{
        font-size: 18px;
        font-weight: 700;

        color: #00f5ff;

        letter-spacing: 0.5px;

        text-shadow:
        0 0 12px rgba(0,245,255,0.35);
    }

    /* =========================
       NAVIGATION
    ========================= */
    .nav-links{
        display: flex;
        align-items: center;
        gap: 15px;
    }

    /* =========================
       LINKS
    ========================= */
    .nav-links a{

        text-decoration: none;

        color: #e2e8f0;

        padding: 10px 18px;

        border-radius: 10px;

        transition: 0.3s;

        font-size: 14px;
        font-weight: 600;

        background: rgba(255,255,255,0.03);

        border: 1px solid rgba(255,255,255,0.05);
    }

    /* =========================
       HOVER
    ========================= */
    .nav-links a:hover{

        background:
        linear-gradient(45deg,
        #00f5ff,
        #bc13fe);

        color: white;

        transform: translateY(-3px);

        box-shadow:
        0 0 22px rgba(0,245,255,0.28);
    }

    /* =========================
       CLICK EFFECT
    ========================= */
    .nav-links a:active{
        transform: scale(0.96);
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