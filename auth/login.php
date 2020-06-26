<?php 
  $doc = $_SERVER['DOCUMENT_ROOT']."".$_SERVER['REQUEST_URI'];
  $pisah = explode("/", $doc);
  $dir   = $_SERVER['DOCUMENT_ROOT']."/".$pisah[3]."/config/config.php";

  include"$dir";
  $faa12 = new database;

  if(isset($_POST['login']))
  {
  	
  	$username = $_POST['username'];
  	$password = $_POST['password'];

  	if($faa12->loginData($username, $password) != 1) {
  		echo "<script>alert('Username / Password Salah!'); document.location='./';</script>";
  	} else {
  		$setData = $faa12->getDataLogin($username);
  		$getLevel = $setData['level'];

  		if($getLevel == "Admin") {
  			session_start();
  			$_SESSION['username'] = $_POST['username'];
  			$_SESSION['level'] = "Admin";
  			echo "<script>alert('Selamat Datang! Anda login sebagai Admin'); document.location='../';</script>";
  		} elseif($getLevel == "Petugas") {
  			session_start();
			$_SESSION['username'] = $_POST['username'];
  			$_SESSION['level'] = "Petugas";
  			echo "<script>alert('Selamat Datang! Anda login sebagai Petugas'); document.location='../';</script>";
  		}
  	}

  }

?>