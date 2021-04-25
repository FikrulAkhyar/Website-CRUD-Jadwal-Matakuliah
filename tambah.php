<?php
// Created By Fikrul Akhyar
// 25 April 2021
include "header.php";

$message = "";

$matakuliah = $_POST['matakuliah'];
$display_roster = mysqli_query($conn, "SELECT * FROM roster where matakuliah = '$matakuliah'");
$roster = mysqli_fetch_assoc($display_roster);
if (isset($_POST['matakuliah']) && isset($_POST['ruang']) && isset($_POST['dosen'])) {
    if ($_POST['matakuliah'] != $roster['matakuliah']) {
        $id_hari = intval($_POST['hari']);
        $id_pukul = intval($_POST['pukul']);
        $matakuliah = mysqli_real_escape_string($conn, $_POST['matakuliah']);
        $ruang = mysqli_real_escape_string($conn, $_POST['ruang']);
        $dosen = mysqli_real_escape_string($conn, $_POST['dosen']);
        $query = "INSERT INTO roster VALUES ('', '$id_hari', '$id_pukul', '$matakuliah', '$ruang', '$dosen')";
    } else {
        $message = "Gagal";
    }

    if (mysqli_query($conn, $query)) {
        $message = "Berhasil";
    } else {
        $message = "Gagal";
    }
}

$display_hari = mysqli_query($conn, "SELECT * FROM hari");
$display_pukul = mysqli_query($conn, "SELECT * FROM pukul");
?>

<!-- Awal Body -->
<div class="container mt-5 bg-light bg-gradient p-5 border" style="width: 500px;">
    <div class="message" id="message" data-message="<?= $message ?>"></div>
    <form action="tambah" method="post">
        <div class="form-group">
            <label for="hari">Hari</label>
            <select class="form-control" id="hari" name="hari" aria-placeholder="Pilih Hari...">
                <?php while ($hari = mysqli_fetch_assoc($display_hari)) : ?>
                    <option value="<?= $hari['id']; ?>"><?= $hari['hari'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pukul">Pukul</label>
            <select class="form-control" id="pukul" name="pukul">
                <?php while ($pukul = mysqli_fetch_assoc($display_pukul)) : ?>
                    <option value="<?= $pukul['id']; ?>"><?= $pukul['pukul'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="matakuliah">Matakuliah</label>
            <input type="text" class="form-control" id="matakuliah" name="matakuliah" required>
        </div>
        <div class="form-group">
            <label for="ruang">Ruang Kuliah</label>
            <input type="text" class="form-control" id="ruang" name="ruang" required>
        </div>
        <div class="form-group">
            <label for="dosen">Pengajar</label>
            <input type="text" class="form-control" id="dosen" name="dosen" required>
        </div>
        <div class="text-center">
            <a href="index"><button type="button" class="btn btn-primary">Kembali</button></a>
            <button class="btn btn-success" type="submit" name="tambah">Tambah</button>
        </div>
    </form>
</div>
<!-- Akhir Body -->

<?php include "footer.php"; ?>