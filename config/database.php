<?php 
$doc = $_SERVER['DOCUMENT_ROOT']."".$_SERVER['REQUEST_URI'];
$pisah = explode("/", $doc);
$dir   = $_SERVER['DOCUMENT_ROOT']."/".$pisah[3]."/config/config.php";

include"$dir";
$faa12 = new database;

class Query extends database {
	function tampilDataPetugas() {
		$data = $this->koneksi->query("SELECT * FROM tb_petugas");
		while($row = $this->koneksi->fetch_assoc($data)) {
			$hasil[] = $row;
		}
		return $hasil;
	}
}


?>