<?php
session_start();

include("header.php");
include("connection.php");
include("kawalan-admin.php");

// =========================
// PROSES DAFTAR JAWATAN
// =========================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama_jawatan = mysqli_real_escape_string($condb, $_POST['nama_jawatan']);

    // Generate ID jawatan (contoh: K1, K2, ...)
    $result = mysqli_query($condb, "SELECT MAX(idjawatan) AS max_id FROM jawatan");
    $row = mysqli_fetch_assoc($result);

    $max_id = $row['max_id'];

    if ($max_id) {

        $num = (int) substr($max_id, 1) + 1;
        $next_id = 'K' . $num;

    } else {

        $next_id = 'K1';
    }

    // INSERT
    $sql = "INSERT INTO jawatan(idjawatan, nama_jawatan)
            VALUES ('$next_id', '$nama_jawatan')";

    if (mysqli_query($condb, $sql)) {

        echo "<script>alert('Jawatan berjaya didaftarkan');</script>";

    } else {

        echo "<script>alert('Ralat: " . mysqli_error($condb) . "');</script>";
    }
}

// senarai jawatan
$jawatan = mysqli_query($condb, "SELECT * FROM jawatan ORDER BY idjawatan");
?>

<link rel="stylesheet" href="style_jawatan_daftar.css">

<div class="jawatan-page">

    <div class="jawatan-container">

        <!-- HEADER -->
        <div class="page-header">

            <h2>Daftar Jawatan</h2>

            <p>Pengurusan jawatan kadet bomba</p>

        </div>

        <!-- FORM -->
        <div class="form-box">

            <h3>Borang Daftar Jawatan</h3>

            <form method="POST" action="">

                <div class="input-group">

                    <label>Nama Jawatan</label>

                    <input 
                        type="text"
                        name="nama_jawatan"
                        placeholder="Contoh: Presiden"
                        required
                    >

                </div>

                <button type="submit" class="submit-btn">
                    Daftar Jawatan
                </button>

            </form>

        </div>

        <!-- TABLE -->
        <div class="table-box">

            <h3>Senarai Jawatan Sedia Ada</h3>

            <div class="table-wrapper">

                <table class="jawatan-table">

                    <tr>

                        <th>ID Jawatan</th>

                        <th>Nama Jawatan</th>

                        <th>Tindakan</th>

                    </tr>

<?php

if (mysqli_num_rows($jawatan) > 0) {

    while ($row = mysqli_fetch_assoc($jawatan)) {

        echo "

        <tr>

            <td>
                ".$row['idjawatan']."
            </td>

            <td class='name'>
                ".$row['nama_jawatan']."
            </td>

            <td>

                <div class='action'>

                    <a 
                        href='jawatan-kemaskini.php?id=".$row['idjawatan']."'
                        class='edit-btn'
                    >
                        Kemaskini
                    </a>

                    <a 
                        href='jawatan-padam.php?id=".$row['idjawatan']."'
                        class='delete-btn'
                        onclick='return confirm(\"Anda pasti?\")'
                    >
                        Padam
                    </a>

                </div>

            </td>

        </tr>

        ";
    }

} else {

    echo "

    <tr>

        <td colspan='3' class='empty'>
            Tiada jawatan didaftarkan
        </td>

    </tr>

    ";
}

?>

                </table>

            </div>

        </div>

    </div>

</div>