<?php

# Memanggil fail header.php
include('header.php');
include('connection.php');

?>

<link rel="stylesheet" href="style_signup.css">

<?php

// Jika borang dihantar
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nokp = $_POST['nokp'];
    $nama = $_POST['nama'];
    $katalaluan = $_POST['katalaluan'];

    $katalaluan_hash = password_hash($katalaluan, PASSWORD_DEFAULT);

    // Semak jika No KP telah wujud
    $semak = $condb->query("SELECT * FROM PENGGUNA WHERE nokp='$nokp'");

    if ($semak->num_rows > 0) {

        echo "
        <div class='message error'>
            No KP telah didaftarkan.
        </div>
        ";

    } else {

        $sql = "INSERT INTO PENGGUNA 
        (nokp, nama, katalaluan, tahap)
        VALUES 
        ('$nokp', '$nama', '$katalaluan', 'Pengguna')";

        if ($condb->query($sql) === TRUE) {

            echo "
            <script>

                alert('Pendaftaran Berjaya. Sila Log Masuk');

                window.location.href='login-borang.php';

            </script>
            ";

        } else {

            echo "
            <div class='message error'>
                Ralat: ".$condb->error."
            </div>
            ";
        }
    }
}
?>

<!DOCTYPE html>

<html>

<head>

    <title>Pendaftaran Pengguna</title>

</head>

<body>

<div class="signup-page">

    <div class="signup-container">

        <!-- HEADER -->
        <div class="signup-header">

            <h2>Borang Daftar Pengguna</h2>

            <p>
                Sila isi maklumat anda dengan lengkap
            </p>

        </div>

        <!-- FORM -->
        <form method="POST">

            <!-- NO KP -->
            <div class="input-group">

                <label>No KP</label>

                <input 
                    type="text"
                    name="nokp"
                    placeholder="Contoh: 12345"
                    pattern="[0-9]{5}"
                    oninvalid="this.setCustomValidity('Sila masukkan 5 digit nombor sahaja')"
                    oninput="this.setCustomValidity('')"
                    required
                >

            </div>

            <!-- NAMA -->
            <div class="input-group">

                <label>Nama</label>

                <input 
                    type="text"
                    name="nama"
                    placeholder="Masukkan nama anda"
                    required
                >

            </div>

            <!-- PASSWORD -->
            <div class="input-group">

                <label>Katalaluan</label>

                <input 
                    type="password"
                    name="katalaluan"
                    placeholder="Masukkan katalaluan"
                    required
                >

            </div>

            <!-- BUTTON -->
            <input 
                type="submit"
                value="DAFTAR"
                class="signup-button"
            >

        </form>

    </div>

</div>

</body>

</html>

<?php include('footer.php'); ?>