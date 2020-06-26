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
            <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>

            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $faa12->baseUrl() ?>">Home</a></li>
               <li class="breadcrumb-item">Petugas</li>
              <!-- <li class="breadcrumb-item active" aria-current="page">Blank Page</li> -->
            </ol>
          </div>

          <div class="row">
          	<div class="col-md-12">
          		<a href="" class="btn btn-primary">Tambah Petugas</a>
          	</div>
          	<div class="col-md-12 mt-4">
          		<div class="responsive">
          			<table class="table table-striped table-hover">
          				<thead>
          					<tr>
          						<th>No</th>
          						<th>Nama Petugas</th>
          						<th>Username</th>
          						<th>No. Telepon</th>
          						<th>Level</th>
          						<th align="center">Aksi</th>
          					</tr>
          				</thead>
          				<tbody>
          					<tr>
          					<?php 
          					$no = 1;
          					foreach ($faa12->tampilDataPetugas() as $petugas) { ?>
          						<tr>
          							<td><?= $no++ ?></td>
          							<td><?= $petugas['nama_petugas'] ?></td>
          							<td><?= $petugas['username'] ?></td>
          							<td><?= $petugas['telp'] ?></td>
          							<td><?= $petugas['level'] ?></td>
          							<td align="center">
          								<a href="edit.php?id=<?= $petugas[id_petugas] ?>"  class="badge badge-info p-1"><i class="fa fa-edit"></i></a>
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


        </div>
        <!---Container Fluid-->
      
      <?php include"../layouts/footer.php"; ?>