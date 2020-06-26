<?php 
  session_start();
  $doc = $_SERVER['DOCUMENT_ROOT']."".$_SERVER['REQUEST_URI'];
  $pisah = explode("/", $doc);
  $dir   = $_SERVER['DOCUMENT_ROOT']."/".$pisah[3]."/config/config.php";

  include"$dir";
  $faa12 = new database();

  if(!isset($_SESSION['username']) || !isset($_SESSION['level'])) {
    echo "<script>alert('Login dibutuhkan!'); document.location='auth';</script>";
  } else {
    $ambildata = $faa12->getDataLogin($_SESSION['username']);
  }

?>

<?php include"layouts/head.php"; ?>
   
   <?php include"layouts/navbar.php"; ?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Irfa Syafiq Azhar</h1>

            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $faa12->baseUrl() ?>">Home</a></li>
<!--               <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Blank Page</li> -->
            </ol>
          </div>

          <div class="text-center">
            <img src="img/logo/server.png" style="max-height: 90px">
            <br>
            <br>
            <div class="card-deck">
 
</div>
          </div>


        </div>
        <!---Container Fluid-->
      
      <?php include"layouts/footer.php"; ?>