<?php
// Created By Fikrul Akhyar
// 25 April 2021
include "header.php";

$message = "";

if (isset($_POST['hapus'])) {
    $id = $_POST['hapus'];

    if (mysqli_query($conn, "DELETE FROM roster where id= '$id'")) {
        $message = "Berhasil";
    } else {
        $message = "Gagal";
    }
}

if (isset($_POST['matakuliah']) && isset($_POST['ruang']) && isset($_POST['dosen'])) {
    $id = intval($_GET['id']);
    $id_hari = intval($_POST['hari']);
    $id_pukul = intval($_POST['pukul']);
    $matakuliah = mysqli_real_escape_string($conn, $_POST['matakuliah']);
    $ruang = mysqli_real_escape_string($conn, $_POST['ruang']);
    $dosen = mysqli_real_escape_string($conn, $_POST['dosen']);
    $query = "UPDATE roster SET id='$id', id_hari='$id_hari', id_pukul='$id_pukul', matakuliah='$matakuliah', ruang_kuliah='$ruang', pengajar='$dosen' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        $message = "Berhasil";
    } else {
        $message = "Gagal";
    }
}

$display = mysqli_query($conn, "SELECT a.*, b.hari, c.pukul FROM roster as a JOIN hari as b ON a.id_hari=b.id JOIN pukul as c ON a.id_pukul=c.id order by b.id, c.id asc");
?>

<!-- Awal body -->
<div class="container">
    <div class="message" id="message" data-message="<?= $message ?>"></div>
    <div class="text-center">
        <img src="img/if.png" alt="" width="100px">
        <img src="img/usk.png" alt="" width="100px">
        <h5>Jadwal Roster Semester 4 2020/2021</h5>
        <h5>Jurusan Informatika</h5>
        <h5>Fakultas Matematika dan Ilmu Pengetahuan Alam</h5>
        <h5>Universitas Syiah Kuala</h5>
    </div>
    <div>
        <a href="tambah"><button class="btn btn-primary">Tambah</button></a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-light table-hover table-bordered">
            <thead class="table-warning">
                <tr class="text-center">
                    <th scope="col">HARI</th>
                    <th scope="col">PUKUL</th>
                    <th scope="col">MATAKULIAH</th>
                    <th scope="col">RUANG KULIAH</th>
                    <th scope="col">PENGAJAR</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($roster = mysqli_fetch_assoc($display)) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $roster['hari']; ?></th>
                        <td class="text-center"><?= $roster['pukul'];  ?></td>
                        <td><?= $roster['matakuliah']; ?></td>
                        <td><?= $roster['ruang_kuliah'];  ?></td>
                        <td><?= $roster['pengajar'];  ?></td>
                        <td class="text-center d-flex justify-content-center">
                            <a href="ubah?id=<?= $roster['id'] ?>"><button type="submit" class="btn btn-warning mx-2 text-light px-4" name="ubah" value="<?= $roster['id'] ?>">Ubah</button></a>
                            <form action="index?id=<?= $roster['id'] ?>" method="post">
                                <button type="submit" class="btn btn-danger" name="hapus" value="<?= $roster['id'] ?>">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Akhir body -->

<?php include "footer.php" ?>