<?php include '../View/inc/Header.php'; ?>
<?php include'../Controller/NhanVienController.php' ?>
<?php
	$class = new NhanVienController();
	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$hoVaTen = $_POST['hoVaTen'];
		$ten = $_POST['ten'];
		$soDienThoai = $_POST['soDienThoai'];
		$email = $_POST['email'];
		$idViTri = $_POST['idViTri'];
		$taiKhoan = $_POST['taiKhoan'];
		$matKhau = $_POST['matKhau'];
		
		$them = $class->Create($hoVaTen, $ten, $soDienThoai, $email, $idViTri, $taiKhoan, $matKhau);
	}
?>
<div class="ViTriAdd" style="text-align: center; font-weight: bold; font-size: 25px;">
	Thêm nhân viên
</div>


<h4>
<?php
	if (isset($them))
	{
		echo $them;
	}
?>
</h4>
<form class="ViTriAdd" action="NhanVienAdd.php" method="post">
  <label for="subName">Họ và tên:</label>
  <input type="text" id="subName" name="hoVaTen" required>
  
  <label for="name">Tên:</label>
  <input type="text" id="name" name="ten" required>
  
  <label for="phone">Số điện thoại:</label>
  <input type="text" id="phone" name="soDienThoai" required>
  
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" required>

  <label for="idViTri">Vị trí:</label>
  <input type="number" id="idViTri" name="idViTri" min="0" required>
  
  <label for="account">Tài khoản:</label>
  <input type="text" id="account" name="taiKhoan" required>
  
  <label for="password">Mật khẩu:</label>
  <input type="password" id="password" name="matKhau" required>

  <button type="submit">Thêm nhân viên</button>
</form>
<?php include '../View/inc/Footer.php'; ?>