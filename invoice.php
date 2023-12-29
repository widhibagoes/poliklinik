<?php
include_once("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Poliklinik</title>
    <style>
        .card-footer-btn {
            display: flex;
            align-items: center;
            border-top-left-radius: 0!important;
            border-top-right-radius: 0!important;
        }
        .text-uppercase-bold-sm {
            text-transform: uppercase!important;
            font-weight: 500!important;
            letter-spacing: 2px!important;
            font-size: .85rem!important;
        }
        .hover-lift-light {
            transition: box-shadow .25s ease,transform .25s ease,color .25s ease,background-color .15s ease-in;
        }
        .justify-content-center {
            justify-content: center!important;
        }
        .btn-group-lg>.btn, .btn-lg {
            padding: 0.8rem 1.85rem;
            font-size: 1.1rem;
            border-radius: 0.3rem;
        }
        .btn-dark {
            color: #fff;
            background-color: #1e2e50;
            border-color: #1e2e50;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(30,46,80,.09);
            border-radius: 0.25rem;
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .p-5 {
            padding: 3rem!important;
        }
        .card-body {
            flex: 1 1 auto;
            padding: 1.5rem 1.5rem;
        }

        tbody, td, tfoot, th, thead, tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .table td, .table th {
            border-bottom: 0;
            border-top: 1px solid #edf2f9;
        }
        .table>:not(caption)>*>* {
            padding: 1rem 1rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }
        .px-0 {
            padding-right: 0!important;
            padding-left: 0!important;
        }
        .table thead th, tbody td, tbody th {
            vertical-align: middle;
        }
        tbody, td, tfoot, th, thead, tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .mt-5 {
            margin-top: 3rem!important;
        }

        .icon-circle[class*=text-] [fill]:not([fill=none]), .icon-circle[class*=text-] svg:not([fill=none]), .svg-icon[class*=text-] [fill]:not([fill=none]), .svg-icon[class*=text-] svg:not([fill=none]) {
            fill: currentColor!important;
        }
        .svg-icon>svg {
            width: 1.45rem;
            height: 1.45rem;
        }
    </style>
</head>
<body>
<h2>Invoice</h2>
    <br>
<div class="container mt-6 mb-7">
    <?php
        $id_pasien = '';
        $id_dokter = '';
        $tgl_periksa = '';
        $catatan = '';

        if (isset($_GET['id'])) {
            $id_periksa = $_GET['id'];

            // Ambil data periksa
            $ambil = mysqli_query($mysqli, "SELECT * FROM periksa WHERE id='$id_periksa'");
            $row = mysqli_fetch_array($ambil);

            if ($row) {
                $id_pasien = $row['id_pasien'];
                $id_dokter = $row['id_dokter'];
                $tgl_periksa = $row['tgl_periksa'];
                $catatan = $row['catatan'];
            }
            // Ambil pasien
            $ambil_pasien = mysqli_query($mysqli, "SELECT * FROM pasien WHERE id='$id_pasien'");
            $row_pasien = mysqli_fetch_array($ambil_pasien);
            $nama_pasien = $row_pasien['nama'];
            $alamat_pasien = $row_pasien['alamat'];
            $hp_pasien = $row_pasien['no_hp'];

            // Ambil dokter
            $ambil_dokter = mysqli_query($mysqli, "SELECT * FROM dokter WHERE id='$id_dokter'");
            $row_dokter = mysqli_fetch_array($ambil_dokter);
            $nama_dokter = $row_dokter['nama'];
            $alamat_dokter = $row_dokter['alamat'];
            $hp_dokter = $row_dokter['no_hp'];
    ?>
        <input type="hidden" name="id" value="<?php echo $id_periksa; ?>">
    <?php
        }
    ?>
    
    <div class="row justify-content-center">
      <div class="col-lg-12 col-xl-7">
        <div class="card">
          <div class="card-body p-5">
            <h2>
              Nota Pembayaran
            </h2>
            <div class="border-top border-gray-200 pt-4 mt-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="text-muted mb-2">Payment No.</div>
                  <strong>#<?php echo $id_periksa; ?></strong>
                </div>
                <div class="col-md-6 text-md-end">
                  <div class="text-muted mb-2">Payment Date</div>
                  <strong><?php echo date('d F y h:i:s', strtotime($tgl_periksa)); ?></strong>
                </div>
              </div>
            </div>

            <div class="border-top border-gray-200 mt-4 py-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="text-muted mb-2">Pasien</div>
                  <strong>
                    <?php echo $nama_pasien; ?>
                  </strong>
                  <p class="fs-sm">
                  <?php echo $alamat_pasien; ?>
                    <br>
                    <a href="#!" class="text-purple"><?php echo $hp_pasien; ?>
                    </a>
                  </p>
                </div>
                <div class="col-md-6 text-md-end">
                  <div class="text-muted mb-2">Dokter</div>
                  <strong>
                  <?php echo $nama_dokter; ?>
                  </strong>
                  <p class="fs-sm">
                  <?php echo $alamat_dokter; ?>
                    <br>
                    <a href="#!" class="text-purple"><?php echo $hp_dokter; ?>
                    </a>
                  </p>
                </div>
              </div>
            </div>

            <table class="table border-bottom border-gray-200 mt-3">
              <thead>
                <tr>
                  <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Deskripsi</th>
                  <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-0">Harga</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="px-0">Jasa Dokter</td>
                  <td class="text-end px-0"><?php echo 'Rp ' . number_format(150000, 2, ',', '.'); ?></td>
                </tr>
                <tr>
                   <?php
                    $ambil_obat = mysqli_query($mysqli, "SELECT obat.id, obat.nama_obat, obat.harga FROM detail_periksa 
                                                          JOIN obat ON detail_periksa.id_obat = obat.id
                                                          WHERE detail_periksa.id_periksa='$id_periksa'");
					$total_harga = 0;

                    while ($row_obat = mysqli_fetch_array($ambil_obat)) {
						$total_harga += $row_obat['harga'];
                    ?>
                        <tr>
                            <td class="px-0"><?php echo $row_obat['nama_obat']; ?></td>
                            <td class="text-end px-0"><?php echo 'Rp ' . number_format($row_obat['harga'], 2, ',', '.'); ?></td>
                        </tr>
                    <?php
                    }
					$total = 150000 + $total_harga;
                    ?>
                </tr>
              </tbody>
            </table>

            <div class="mt-5">
              <div class="d-flex justify-content-end">
                <p class="text-muted me-3">Jasa Dokter:</p>
                <span><?php echo 'Rp ' . number_format(150000, 2, ',', '.'); ?></span>
              </div>
              <div class="d-flex justify-content-end">
                <p class="text-muted me-3">Subtotal Obat :</p>
                <span><?php echo 'Rp ' . number_format($total_harga, 2, ',', '.'); ?></span>
              </div>
              <div class="d-flex justify-content-end mt-3">
                <h5 class="me-3">Total:</h5>
                <h5 class="text-success"><?php echo 'Rp ' . number_format($total, 2, ',', '.'); ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>