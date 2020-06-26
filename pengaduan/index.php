<?php 
  session_start();
  $doc = $_SERVER['DOCUMENT_ROOT']."".$_SERVER['REQUEST_URI'];
  $pisah = explode("/", $doc);
  $dir   = $_SERVER['DOCUMENT_ROOT']."/".$pisah[3]."/config/config.php";

  include"$dir";
  $faa12 = new database;

  if(!isset($_SESSION['username']) || !isset($_SESSION['level'])) {
    echo "<script>alert('Login dibutuhkan!'); document.location='auth';</script>";
  } else {
    $ambildata = $faa12->getDataLogin($_SESSION['username']);
  }

?>

<?php include"../layouts/head.php"; ?>
   
   <?php include"../layouts/navbar.php"; ?>

        <?php 
          if($ambildata['level'] == "Admin" || $ambildata['level'] == "Petugas") { ?>

<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Masyarakat</h1>

            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $faa12->baseUrl() ?>">Home</a></li>
               <li class="breadcrumb-item">Data Masyarakat</li>
              <!-- <li class="breadcrumb-item active" aria-current="page">Blank Page</li> -->
            </ol>
          </div>

          <div class="row">
            <div class="col-md-12 mt-1">
              <div class="responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Tanggal</th>
                      <th>Isi Laporan</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th align="center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php 
                    $no = 1;
                    foreach ($faa12->tampilDataLaporan() as $laporan) { ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $laporan['nik'] ?></td>
                        <td><?= $laporan['tgl_pengaduan'] ?></td>
                        <td><?= $laporan['isi_laporan'] ?></td>
                        <td><a href="<?= $faa12->baseUrl() ?>img/laporan/<?= $laporan['foto'] ?>" target="_blank">Lihat</a></td>
                        <td><?= $laporan['status'] ?></td>
                        <td align="center">
                          <a href="#" class="badge badge-info p-1">Beri Tanggapan</a>
                        </td>
                      </tr>.
                    <?php } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
        <!---Container Fluid-->

        <?php } ?>
      
      <?php include"../layouts/footer.php"; ?>