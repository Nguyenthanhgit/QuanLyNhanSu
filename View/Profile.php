<?php
    include 'inc/Header.php';
    include '../Controller/NhanVienController.php';
?>

<?php
    $classNhanVien = new NhanVienController();

    if (!isset($_GET['NhanVienId']) || $_GET['NhanVienId'] == NULL)
    {
      echo "<script>window.location='Index.php'</script>";
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
      
      $sua = $classNhanVien->Update($id, $hoVaTen, $ten, $soDienThoai, $email, $idViTri, $taiKhoan, $matKhau);
    }
?>

<?php
	if (isset($sua))
	{
		echo $sua;
	}
?>

<?php
	$resultNhanVien = $classNhanVien->GetNhanVien($id = $id);
	if ($resultNhanVien)
	{
		while ($nhanVien = $resultNhanVien->fetch_assoc())
		{
			$taiKhoan = $classNhanVien->GetTaiKhoan($idNhanVien = $id)->fetch_assoc();
?>

<form action="" method="POST">
<div class="profile">
  <div class="profile-header">
    <img class="profile-img" src="https://via.placeholder.com/150x150" alt="Profile picture">
    <button class="edit-profile-img-btn">Chỉnh sửa</button>
  </div>
  <div class="profile-info">
    <div class="info-item">
      <label for="hoVaTen">Họ và tên đệm:</label>
      <span class="Pname"><?php echo $nhanVien['HoVaTenDem'] ?></span>
      <input type="text" id="Pname" name="hoVaTen" class="edit-name-input">
    </div>
    <div class="info-item">
      <label for="ten">Tên:</label>
      <span class="name"><?php echo $nhanVien['Ten'] ?></span>
      <input type="text" id="name" name="ten" class="edit-Pname-input">
    </div>
    <div class="info-item">
      <label for="soDienThoai">Số điện thoại:</label>
      <span class="phone"><?php echo $nhanVien['SoDienThoai'] ?></span>
      <input type="text" id="phone" name="soDienThoai" class="edit-phone-input">
    </div>
    <div class="info-item">
      <label for="email">Email:</label>
      <span class="email"><?php echo $nhanVien['Email'] ?></span>
      <input type="text" id="email" name="email" class="edit-email-input">
    </div>
    <div class="info-item">
      <label for="taiKhoan">Tài khoản:</label>
      <span class="username"><?php echo $taiKhoan['TaiKhoan'] ?></span>
      <input type="text" id="username" name="taiKhoan" class="edit-username-input">
    </div>
    <div class="info-item">
      <label for="matKhau">Mật khẩu:</label>
      <span class="password">********</span>
      <input type="password" id="password" name="matKhau" class="edit-password-input" value="<?php echo $taiKhoan['MatKhau'] ?>">
    </div>
    <div class="edit-save-buttons">
      <button class="edit-btn" type="button">Chỉnh sửa</button>
      <button class="save-btn" type="submit">Lưu</button>
    </div>
    <input type="text" name="idViTri" value="<?php echo $nhanVien['IdViTri'] ?>" style="display: none">
  </div>
  </div>
</form>

<?php
		}
	}
?>

<?php
    include 'inc/Footer.php';
?>