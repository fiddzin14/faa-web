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


  if($ambildata['level'] != "Admin") {
    echo "<script>alert('Anda tidak memiliki akses!'); document.location='../';</script>";
    die();
  }

?>

<?php include"../layouts/head.php"; ?>
   
   <?php include"../layouts/navbar.php"; ?>

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
          	<div class="col-md-12">
          		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
          	</div>
          	<div class="col-md-12 mt-4">
          		<div class="responsive">
          			<table class="table table-striped table-hover">
          				<thead>
          					<tr>
          						<th>No</th>
          						<th>NIK</th>
          						<th>Nama Lengkap</th>
          						<th>Username</th>
          						<th>No. Telepon</th>
          						<th align="center">Aksi</th>
          					</tr>
          				</thead>
          				<tbody>
          					<tr>
          					<?php 
          					$no = 1;
          					foreach ($faa12->tampilDataMasyarakat() as $masyarakat) { ?>
          						<tr>
          							<td><?= $no++ ?></td>
          							<td><?= $masyarakat['nik'] ?></td>
          							<td><?= $masyarakat['nama'] ?></td>
          							<td><?= $masyarakat['username'] ?></td>
          							<td><?= $masyarakat['telp'] ?></td>
          							<td align="center">
          								<a href="edit.php?id=<?= $petugas[id_petugas] ?>" class="badge badge-info p-1"><i class="fa fa-edit"></i></a>
          								<a href="hapus.php?id=<?= $petugas[id_petugas] ?>" onclick="return confirm('Anda yakin ingin menghapus data?');" class="badge badge-danger p-1"><i class="fa fa-trash"></i></a>
          							</td>
          						</tr>.
          					<?php } ?>
          					</tr>
          				</tbody>
          			</table>
          		</div>
          	</div>
          </div>
          <!-- Modal -->
          <div class="modal fade w-100" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Masyarakat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="tambah.php" method="POST">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" name="nik" placeholder="Masukan NIK">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col">
                        <input type="text" class="form-control" name="username" placeholder="Masukan Nama Pengguna">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" name="password" placeholder="Masukan Kata Sandi">
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="telp" placeholder="Masukan No Telepon">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      
      <?php include"../layouts/footer.php"; ?>