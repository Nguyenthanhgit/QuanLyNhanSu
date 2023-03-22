<?php
	include '../Model/database.php';
	include'../Model/format.php';
?>

<?php
	class ChamCongController
	{
		private $database;
		private $format;
		
		public function __construct()
		{
			$this->database = new Database();
			$this->format = new Format();
		}
		
		public function CheckChamCong($idNhanVien)
		{
			$date = date("Y-m-d");
			$query = "SELECT * FROM chamcong WHERE NgayLam = '$date' AND IdNhanVien = '$idNhanVien'";
			$result = $this->database->select($query);
			if (is_bool($result))
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
		public function ChamCong($idNhanVien)
		{
			if (empty($idNhanVien))
			{
				return;
			}
			
			$idNhanVien = $this->format->validation($idNhanVien);
			
			$idNhanVien = mysqli_real_escape_string($this->database->link, $idNhanVien);
			
			$date = date("Y-m-d");
			$query = "INSERT INTO `chamcong`(`IdNhanVien`, `NgayLam`) VALUES ('$idNhanVien','$date')";
			$result = $this->database->insert($query);
			if ($result)
			{
				$msg = "asd";
				return $msg;
			}
		}
	}
?>