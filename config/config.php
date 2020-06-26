<?php 

class database {

	private $host  = "localhost";
	private $uname = "root";
	private $pass  = "";
	private $db    = "db_pengaduan";

	private $koneksi;

	function __construct() {
		$this->koneksi = new mysqli($this->host, $this->uname, $this->pass, $this->db) or die("Database Gagal Terhubung!");

		return $this->koneksi;
	}

	function baseUrl() {
		echo "http://localhost/Faa12/";
	}

	// Login

	function loginData($username, $password) {
		$query = $this->koneksi->query("SELECT * FROM tb_petugas WHERE username='$username' AND password='$password'");
		$checkData = mysqli_num_rows($query);
		
		return $checkData;
	}

	function getDataLogin($username) {
		$data = $this->koneksi->query("SELECT * FROM tb_petugas WHERE username='$username'");
		return $data->fetch_assoc();
	}


	// Laporan 

	function tampilDataLaporan() {
		$data = $this->koneksi->query("SELECT * FROM tb_pengaduan");
		while($row = $data->fetch_assoc()) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	// Petugas

	function tampilDataPetugas() {
		$data = $this->koneksi->query("SELECT * FROM tb_petugas");
		while($row = $data->fetch_assoc()) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	// Masyarakat

	function tampilDataMasyarakat() {
		$data = $this->koneksi->query("SELECT * FROM tb_masyarakat");
		while($row = $data->fetch_assoc()) {
			$hasil[] = $row;
		}
		return $hasil;
	}

}

?>