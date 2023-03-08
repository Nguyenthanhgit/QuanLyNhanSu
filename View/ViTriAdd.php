<?php include '../View/inc/Header.php'; ?>
<?php include'../Controller/ViTriController.php' ?>
<?php
	$class = new ViTriController();
	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$ten = $_POST['ten'];
		$luongCoBan = $_POST['luongCoBan'];
		$capDo = $_POST['capDo'];
		
		$them = $class->Create($ten, $luongCoBan, $capDo);
	}
?>
<div class="ViTriAdd" style="text-align: center; font-weight: bold; font-size: 25px;">
	Thêm vị trí
</div>


<h4>
<?php
	if (isset($them))
	{
		echo $them;
	}
?>
</h4>
<form class="ViTriAdd" action="ViTriAdd.php" method="post">
  <label for="name">Tên:</label>
  <input type="text" id="name" name="ten" required>

  <label for="basic_salary">Lương cơ bản:</label>
  <input type="number" id="basic_salary" name="luongCoBan" min="0" required>

  <label for="level">Cấp độ:</label>
<input type="number" id="level" name="capDo" min="0" required>

  <button type="submit">Thêm vị trí</button>
</form>
<?php include '../View/inc/Footer.php'; ?>