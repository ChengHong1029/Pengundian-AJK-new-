<?php
session_start();

include('header.php');
include('connection.php');
include('kawalan-admin.php');

$id = $_GET['id'] ?? '';

// Dapatkan data jawatan
$result = mysqli_query($condb, "SELECT * FROM jawatan WHERE idjawatan = '$id'");
$jawatan = mysqli_fetch_assoc($result);

// Proses form jika data dihantar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_jawatan = mysqli_real_escape_string($condb, $_POST['id_jawatan']);
    $nama_jawatan = mysqli_real_escape_string($condb, $_POST['nama_jawatan']);

    if ($id_jawatan != $id) {

        $check_sql = "SELECT idjawatan FROM jawatan WHERE idjawatan = '$id_jawatan'";
        $check_result = mysqli_query($condb, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {

            echo "<script>alert('Ralat: ID jawatan sudah wujud!');</script>";

        } else {

            $sql = "UPDATE jawatan 
                    SET idjawatan = '$id_jawatan', 
                        nama_jawatan = '$nama_jawatan' 
                    WHERE idjawatan = '$id'";

            if (mysqli_query($condb, $sql)) {

                echo "<script>
                    alert('Jawatan berjaya dikemaskini!');
                    window.location.href='jawatan-daftar.php';
                </script>";

            } else {

                echo "<script>alert('Ralat: " . mysqli_error($condb) . "');</script>";
            }
        }

    } else {

        $sql = "UPDATE jawatan 
                SET nama_jawatan = '$nama_jawatan' 
                WHERE idjawatan = '$id'";

        if (mysqli_query($condb, $sql)) {

            echo "<script>
                alert('Jawatan berjaya dikemaskini!');
                window.location.href='jawatan-daftar.php';
            </script>";

        } else {

            echo "<script>alert('Ralat: " . mysqli_error($condb) . "');</script>";
        }
    }
}
?>

<link rel="stylesheet" href="style_jawatan_kemaskini.css">

<div class="edit-page">

    <div class="edit-container">

        <!-- HEADER -->
        <div class="edit-header">

            <h2>Kemaskini Jawatan</h2>

            <p>Edit maklumat jawatan</p>

        </div>

        <!-- FORM -->
        <form method="POST" action="">

            <!-- ID -->
            <div class="input-group">

                <label>ID Jawatan</label>

                <input 
                    type="text"
                    name="id_jawatan"
                    value="<?= $jawatan['idjawatan']; ?>"
                    required
                >

            </div>

            <!-- NAMA -->
            <div class="input-group">

                <label>Nama Jawatan</label>

                <input 
                    type="text"
                    name="nama_jawatan"
                    value="<?= $jawatan['nama_jawatan']; ?>"
                    required
                >

            </div>

            <!-- BUTTON -->
            <div class="button-group">

                <button type="submit" class="save-btn">
                    Kemaskini
                </button>

                <a href="jawatan-daftar.php" class="cancel-btn">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>