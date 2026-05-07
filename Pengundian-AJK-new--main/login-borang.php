<?php
# memulakan fungsi session
session_start();

# memanggil fail header.php
include('header.php');
?>

<link rel="stylesheet" href="style_login.css">

<div class="login-page">

    <div class="login-container">

        <!-- Tajuk -->
        <div class="login-header">

            <h2>Login Pengguna dan Admin</h2>

            <p>Sila masukkan nombor kad pengenalan dan katalaluan anda</p>

        </div>

        <!-- Borang Login -->
        <form action="login-proses.php" method="POST">

            <div class="input-group">

                <label>No KP</label>

                <input 
                    type="text"
                    name="nokp"
                    placeholder="Masukkan No KP"
                    required
                >

            </div>

            <div class="input-group">

                <label>Katalaluan</label>

                <input 
                    type="password"
                    name="katalaluan"
                    placeholder="Masukkan Katalaluan"
                    required
                >

            </div>

            <input 
                class="login-button"
                type="submit"
                value="LOGIN"
            >

        </form>

    </div>

</div>

<?php include('footer.php'); ?>