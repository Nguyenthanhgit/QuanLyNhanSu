<?php include '../View/inc/Header.php'; ?>
<?php include '../Controller/NhanVienController.php'; ?>
<?php
	$class = new NhanVienController();
	
	if (!isset($_GET['NhanVienId']) || $_GET['NhanVienId'] == NULL)
	{
		echo "<script>window.location='NhanVienIndex.php'</script>";
	}
	else
	{
		$id = $_GET['NhanVienId'];
	}
	
	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$hoVaTen = $_POST['hoVaTen'];
		$ten = $_POST['ten'];
		$soDienThoai = $_POST['soDienThoai'];
		$email = $_POST['email'];
		$idViTri = $_POST['idViTri'];
		$taiKhoan = $_POST['taiKhoan'];
		$matKhau = $_POST['matKhau'];
		
		$sua = $class->Update($id, $hoVaTen, $ten, $soDienThoai, $email, $idViTri, $taiKhoan, $matKhau);
	}
?>
<div class="ViTriAdd" style="text-align: center; font-weight: bold; font-size: 25px;">
	Sửa nhân viên
</div>


<h4>
<?php
	if (isset($sua))
	{
		echo $sua;
	}
?>
</h4>
<?php
	$NhanVien = $class->GetNhanVien($id = $id);
	if ($NhanVien)
	{
		while ($resultNhanVien = $NhanVien->fetch_assoc())
		{
			$resultTaiKhoan = $class->GetTaiKhoan($idNhanVien = $id)->fetch_assoc();
?>
<form class="ViTriAdd" action="" method="post">
  <label for="subName">Họ và tên:</label>
  <input type="text" id="subName" name="hoVaTen" value="<?php echo $resultNhanVien['HoVaTenDem'] ?>" required>
  
  <label for="name">Tên:</label>
  <input type="text" id="name" name="ten" value="<?php echo $resultNhanVien['Ten'] ?>" required>
  
  <label for="phone">Số điện thoại:</label>
  <input type="text" id="phone" name="soDienThoai" value="<?php echo $resultNhanVien['SoDienThoai'] ?>" required>
  
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="<?php echo $resultNhanVien['Email'] ?>" required>

  <label for="idViTri">Vị trí:</label>
  <input type="number" id="idViTri" name="idViTri" min="0" value="<?php echo $resultNhanVien['IdViTri'] ?>" required>
  
  <label for="account">Tài khoản:</label>
  <input type="text" id="account" name="taiKhoan" value="<?php echo $resultTaiKhoan['TaiKhoan'] ?>" required>
  
  <label for="password">Mật khẩu:</label>
  <input type="password" id="password" name="matKhau" value="<?php echo $resultTaiKhoan['MatKhau'] ?>" required>

  <button type="submit">Sửa nhân viên</button>
</form>
<?php
		}
	}
?>
<?php include '../View/inc/Footer.php'; ?>