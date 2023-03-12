<?php
	include '../Model/database.php';
	include'../Model/format.php';
?>

<?php
	class NhanVienController
	{
		private $database;
		private $format;
		
		public function __construct()
		{
			$this->database = new Database();
			$this->format = new Format();
		}
		
		public function Create($hoVaTen, $ten, $soDienThoai, $email, $idViTri, $taiKhoan, $matKhau)
		{
			if (empty($hoVaTen) || empty($ten) || empty($soDienThoai) || empty($email) || empty($idViTri) || empty($taiKhoan) || empty($matKhau))
			{
				$msg = "Cac thanh phan khong duoc bo trong!";
				return $msg;
			}
			
			$hoVaTen = $this->format->validation($hoVaTen);
			$ten = $this->format->validation($ten);
			$soDienThoai = $this->format->validation($soDienThoai);
			$email = $this->format->validation($email);
			$idViTri = $this->format->validation($idViTri);
			$taiKhoan = $this->format->validation($taiKhoan);
			$matKhau = $this->format->validation($matKhau);
			
			
			$ten = mysqli_real_escape_string($this->database->link, $ten);
			$hoVaTen = mysqli_real_escape_string($this->database->link, $hoVaTen);
			$soDienThoai = mysqli_real_escape_string($this->database->link, $soDienThoai);
			$email = mysqli_real_escape_string($this->database->link, $email);
			$idViTri = mysqli_real_escape_string($this->database->link, $idViTri);
			$taiKhoan = mysqli_real_escape_string($this->database->link, $taiKhoan);
			$matKhau = mysqli_real_escape_string($this->database->link, $matKhau);
			
			$check = "SELECT * FROM vitri WHERE Id = '$idViTri'";
			$result = $this->database->select($check);
			if ($result->num_rows <= 0)
			{
				$msg = "Không tồn tại vị trí";
				return $msg;
			}
			
			$check = "SELECT * FROM taikhoannhanvien WHERE TaiKhoan = '$taiKhoan'";
			$result = $this->database->select($check);
			if (!is_bool($result))
			{
				$msg = "Tài khoản đã tồn tại";
				return $msg;
			}
			
			$query = "INSERT INTO nhanvien(IdViTri, HoVaTenDem, Ten, SoDienThoai, Email) VALUE ('$idViTri', '$hoVaTen', '$ten', '$soDienThoai', '$email')";
			$result = $this->database->insert($query);
			
			$query = "SELECT * FROM nhanvien ORDER BY id DESC LIMIT 1";
			$result = $this->database->select($query);
			if ($result->num_rows > 0)
			{
				$nhanVien = $result->fetch_assoc();
				
				$date = date("Y-m-d H:i:s");
				$idNhanVien = $nhanVien['Id'];
				$query = "INSERT INTO taikhoannhanvien(IdNhanVien, TaiKhoan, MatKhau, LanDangNhapCuoi) VALUE ('$idNhanVien', '$taiKhoan', '$matKhau', '$date')";
				$result = $this->database->insert($query);
			}
			
			
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
			$query = "SELECT * FROM nhanvien ORDER BY Id DESC";
			$result = $this->database->select($query);
			return $result;
		}
		
		public function GetViTri($id = null, $ten = null, $luongCoBan = null, $capDo = null)
		{
			if (is_null($id) && is_null($ten) && is_null($LuongCoBan) && is_null($capDo))
			{
				return Read();
			}
			
			$query = "SELECT * FROM vitri WHERE ";
			if (!is_null($id))
			{
				$query .= " Id = '$id' ";
			}
			
			if (!is_null($ten))
			{
				$query .= " Ten = '$ten' ";
			}
			
			if (!is_null($luongCoBan))
			{
				$query .= " LuongCoBan = '$luongCoBan' ";
			}
			
			if (!is_null($capDo))
			{
				$query .= " CapDo = '$capDo' ";
			}
			
			$result = $this->database->select($query);
			return $result;
		}
		
		public function Update($id, $ten, $luongCoBan, $capDo)
		{
				if (empty($ten) || empty($luongCoBan) || empty($capDo))
			{
				$msg = "Cac thanh phan khong duoc bo trong!";
				return $msg;
			}
			
			$id = $this->format->validation($id);
			$ten = $this->format->validation($ten);
			$luongCoBan = $this->format->validation($luongCoBan);
			$capDo = $this->format->validation($capDo);
			
			$id = mysqli_real_escape_string($this->database->link, $id);
			$ten = mysqli_real_escape_string($this->database->link, $ten);
			$luongCoBan = mysqli_real_escape_string($this->database->link, $luongCoBan);
			$capDo = mysqli_real_escape_string($this->database->link, $capDo);
			
			$query = "UPDATE vitri SET Ten = '$ten', LuongCoBan = '$luongCoBan', CapDo = '$capDo' WHERE Id = '$id'";
			$result = $this->database->insert($query);
			if ($result)
			{
				$msg = "Sửa thành công";
				return $msg;
			}
			else
			{
				$msg = "Sửa thất bại";
				return $msg;
			}

		}
		
		public function Del($id)
		{
			$query = "DELETE FROM vitri WHERE Id = '$id'";
			$result = $this->database->delete($query);
			if ($result)
			{
				$msg = "Xóa thành công";
				return $msg;
			}
			else
			{
				$msg = "Xóa thất bại";
				return $msg;
			}
		}
	}
?>