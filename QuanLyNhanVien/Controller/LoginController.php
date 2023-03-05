<?php
	include '../Model/database.php';
	include'../Model/format.php';
	include'../Library/session.php';
	Session::checkLogin();
?>

<?php
	class LoginController
	{
		private $database;
		private $format;
		
		public function __construct()
		{
			$this->database = new Database();
			$this->format = new Format();
		}
		
		public function Login($user, $password)
		{
			if (empty($user) || empty($password))
			{
				$msg = "Tai khoan hoac mat khau khong duoc bo trong!";
				return $msg;
			}
			
			$user = $this->format->validation($user);
			$password = $this->format->validation($password);
			
			$user = mysqli_real_escape_string($this->database->link, $user);
			$password = mysqli_real_escape_string($this->database->link, $password);
			
			$query = "SELECT * FROM taikhoannhanvien WHERE TaiKhoan = '$user' AND MatKhau = '$password' LIMIT 1";
			$result = $this->database->select($query);
			if ($result != false)
			{
				$value = $result->fetch_assoc();
				Session::set('login', true);
				Session::set('userId', $value['Id']);
				Session::set('userAccount', $value['TaiKhoan']);
				header('Location:Index.php');
			}
			else
			{
				$msg = "Tai khoan hoac mat khau khong dung!";
				return $msg;
			}
		}
	}
?>