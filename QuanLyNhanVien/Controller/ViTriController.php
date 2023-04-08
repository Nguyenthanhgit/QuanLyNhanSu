<?php
	include '../Model/database.php';
	include'../Model/format.php';
?>

<?php
	class ViTriController
	{
		private $database;
		private $format;
		
		public function __construct()
		{
			$this->database = new Database();
			$this->format = new Format();
		}
		
		public function Create($ten, $luongCoBan, $capDo)
		{
			if (empty($ten) || empty($luongCoBan) || empty($capDo))
			{
				$msg = "Cac thanh phan khong duoc bo trong!";
				return $msg;
			}
			
			$ten = $this->format->validation($ten);
			$luongCoBan = $this->format->validation($luongCoBan);
			$capDo = $this->format->validation($capDo);
			
			
			$ten = mysqli_real_escape_string($this->database->link, $ten);
			$luongCoBan = mysqli_real_escape_string($this->database->link, $luongCoBan);
			$capDo = mysqli_real_escape_string($this->database->link, $capDo);
			
			$query = "INSERT INTO vitri(Ten, LuongCoBan, CapDo) VALUE ('$ten', '$luongCoBan', '$capDo')";
			$result = $this->database->insert($query);
			if ($result)
			{
				$msg = "Thêm thành công";
				return $msg;
			}
			else
			{
				$msg = "Thêm thất bại";
				return $msg;
			}

		}
		
		public function Read()
		{
			$query = "SELECT * FROM vitri ORDER BY Id DESC";
			$result = $this->database->select($query);
			return $result;
		}
	}
?>