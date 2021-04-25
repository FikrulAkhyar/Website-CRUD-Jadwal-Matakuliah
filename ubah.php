<?php
// Created By Fikrul Akhyar
// 25 April 2021
include "header.php";

$message = "";

$id = intval($_GET['id']);
$display_hari = mysqli_query($conn, "SELECT * FROM hari");
$display_pukul = mysqli_query($conn, "SELECT * FROM pukul");
$display = mysqli_query($conn, "SELECT * FROM roster where id = '$id'");
$roster = mysqli_fetch_assoc($display);
?>

<!-- Awal Body -->
<div class=" container mt-5 p-5 border bg-light bg-gradient" style="width: 500px;">
    <div class="message" id="message" data-message="<?= $message ?>"></div>
    <form action="index?id=<?= $id ?>" method="post">
        <div class="form-group">
            <label for="hari">Hari</label>
            <select class="form-control" id="hari" name="hari" placeholder="Pilih Hari...">
                <?php while ($hari = mysqli_fetch_assoc($display_hari)) : ?>
                    <?php if ($hari['id'] == $roster['id_hari']) : ?>
                        <option value="<?= $hari['id']; ?>" selected><?= $hari['hari'] ?></option>
                    <?php else : ?>
                        <option value="<?= $hari['id']; ?>"><?= $hari['hari'] ?></option>
                    <?php endif; ?>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pukul">Pukul</label>
            <select class="form-control" id="pukul" name="pukul">
                <?php while ($pukul = mysqli_fetch_assoc($display_pukul)) : ?>
                    <?php if ($pukul['id'] == $roster['id_pukul']) : ?>
                        <option value="<?= $pukul['id']; ?>" selected><?= $pukul['pukul'] ?></option>
                    <?php else : ?>
                        <option value="<?= $pukul['id']; ?>"><?= $pukul['pukul'] ?></option>
                    <?php endif; ?>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="matakuliah">Matakuliah</label>
            <input type="text" class="form-control" id="matakuliah" name="matakuliah" value="<?= $roster['matakuliah']; ?>">
        </div>
        <div class="form-group">
            <label for="ruang">Ruang Kuliah</label>
            <input type="text" class="form-control" id="ruang" name="ruang" value="<?= $roster['ruang_kuliah']; ?>">
        </div>
        <div class=" form-group">
            <label for="dosen">Pengajar</label>
            <input type="text" class="form-control" id="dosen" name="dosen" value="<?= $roster['pengajar']; ?>">
        </div>
        <div class=" text-center">
            <a href="index"><button type="button" class="btn btn-primary">Kembali</button></a>
            <button class="btn btn-warning px-4 text-light" type="submit" name="tambah">Ubah</button>
        </div>
    </form>
</div>
<!-- Akhir Body -->

<?php include "footer.php"; ?>