<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (!isset($_SESSION['username'])) {
        header("Location: index.php?page=loginUser");
        exit;
    }
    include_once("koneksi.php");

    if (isset($_POST['simpan'])) {
        if (isset($_POST['id'])) {
            $ubah = mysqli_query($mysqli, "UPDATE periksa SET 
                                            id_pasien = '" . $_POST['id_pasien'] . "',
                                            id_dokter = '" . $_POST['id_dokter'] . "',
                                            tgl_periksa = '" . $_POST['tgl_periksa'] . "',
                                            catatan = '" . $_POST['catatan'] . "',
                                            obat = '" . $_POST['obat'] . "'
                                            WHERE id = '" . $_POST['id'] . "'");
        } else {
            $tambah = mysqli_query($mysqli, "INSERT INTO periksa (id_pasien, id_dokter, tgl_periksa, catatan, obat) 
                                            VALUES (
                                                '" . $_POST['id_pasien'] . "',
                                                '" . $_POST['id_dokter'] . "',
                                                '" . $_POST['tgl_periksa'] . "',
                                                '" . $_POST['catatan'] . "',
                                                '" . $_POST['obat'] . "'
                                            )");
        }
        echo "<script> 
                document.location='index.php?page=periksa';
                </script>";
    }
    if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'hapus') {
            $hapus = mysqli_query($mysqli, "DELETE FROM periksa WHERE id = '" . $_GET['id'] . "'");
        }

        echo "<script> 
                document.location='index.php?page=periksa';
                </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Poliklinik</title>
</head>

<body>
    <h2>Periksa</h2>
    <br>
    <div class="container">
        <!-- <h1 class="my-5">Pasien</h1> -->

        <form class="form-horizontal" method="POST" action="" name="myForm" onsubmit="return validateForm();">
            <!-- PHP code to retrieve data if ID is set -->
            <?php
            $id_pasien = '';
            $id_dokter = '';
            $tgl_periksa = '';
            $catatan = '';
            $obat = '';
            if (isset($_GET['id'])) {
                $ambil = mysqli_query($mysqli, "SELECT * FROM periksa WHERE id='" . $_GET['id'] . "'");
                while ($row = mysqli_fetch_array($ambil)) {
                    $id_pasien = $row['id_pasien'];
                    $id_dokter = $row['id_dokter'];
                    $tgl_periksa = $row['tgl_periksa'];
                    $catatan = $row['catatan'];
                    $obat = $row['obat'];
                }
            ?>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <?php
            }
            ?>
            <div class="row">
                <label for="inputPasien" class="form-label fw-bold">Pasien</label>
                <div>
                    <select class="form-control" name="id_pasien">
                        <option hidden>Pilih Pasien</option>
                        <?php
                        $selected = '';
                        $pasien = mysqli_query($mysqli, "SELECT * FROM pasien");
                        while ($data = mysqli_fetch_array($pasien)) {
                            if ($data['id'] == $id_pasien) {
                                $selected = 'selected="selected"';
                            } else {
                                $selected = '';
                            }
                        ?>
                            <option value="<?php echo $data['id'] ?>" <?php echo $selected ?>><?php echo $data['nama'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mt-1">
                <label for="inputDokter" class="form-label fw-bold">Dokter</label>
                <div>
                    <select class="form-control" name="id_dokter">
                        <option hidden>Pilih Dokter</option>
                        <?php
                        $selected = '';
                        $dokter = mysqli_query($mysqli, "SELECT * FROM dokter");
                        while ($data = mysqli_fetch_array($dokter)) {
                            if ($data['id'] == $id_dokter) {
                                $selected = 'selected="selected"';
                            } else {
                                $selected = '';
                            }
                        ?>
                            <option value="<?php echo $data['id'] ?>" <?php echo $selected ?>><?php echo $data['nama'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mt-1">
            <label for="inputTanggal" class="form-label fw-bold">Tanggal Periksa</label>
                <div>
                    <input type="datetime-local" class="form-control" name="tgl_periksa" id="inputTanggal" placeholder="Tanggal Periksa" value="<?php echo $tgl_periksa ?>">
                </div>
            </div>
            <div class="row mt-1">
            <label for="inputCatatan" class="form-label fw-bold">Catatan</label>
                <div>
                    <input type="text" class="form-control" name="catatan" id="inputCatatan" placeholder="Catatan" value="<?php echo $catatan ?>">
                </div>
            </div>
            <div class="row mt-1">
            <label for="inputObat" class="form-label fw-bold">Obat</label>
                <div>
                    <input type="text" class="form-control" name="obat" id="inputObat" placeholder="Obat" value="<?php echo $obat ?>">
                </div>
            </div>
                
            <div class="row mt-3">
                <div class = col>
                    <button type="submit" class="btn btn-primary rounded-pill px-3 mt-auto" name="simpan">Simpan</button>
                </div>
            </div> 
            </div>
        </form>
        <br>
        <br>
        <!-- Table -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Nama Dokter</th>
                    <th scope="col">Tanggal Periksa</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Obat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to fetch and display data -->
                <?php
                $result = mysqli_query($mysqli, "SELECT pr.*,d.nama as 'nama_dokter', p.nama as 'nama_pasien' FROM periksa pr LEFT JOIN dokter d ON (pr.id_dokter=d.id) LEFT JOIN pasien p ON (pr.id_pasien=p.id) ORDER BY pr.tgl_periksa DESC");
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['nama_pasien'] ?></td>
                        <td><?php echo $data['nama_dokter'] ?></td>
                        <td><?php echo $data['tgl_periksa'] ?></td>
                        <td><?php echo $data['catatan'] ?></td>
                        <td><?php echo $data['obat'] ?></td>
                        <td>
                            <a class="btn btn-success rounded-pill px-3" href="index.php?page=periksa&id=<?php echo $data['id'] ?>">Ubah</a>
                            <a class="btn btn-danger rounded-pill px-3" href="index.php?page=periksa&id=<?php echo $data['id'] ?>&aksi=hapus">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
